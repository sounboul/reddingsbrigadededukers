<?php

use Aws\CloudWatchLogs\CloudWatchLogsClient;
use Maxbanton\Cwh\Handler\CloudWatch;
use Monolog\Logger;
use Monolog\Formatter\JsonFormatter;

// $sdkParams = [
//     'region' => 'eu-west-1',
//     'version' => 'latest',
//     'credentials' => [
//         'key' => 'your AWS key',
//         'secret' => 'your AWS secret',
//         'token' => 'your AWS session token', // token is optional
//     ]
// ];
class CloudWatchLoggerFactory {

    public function __invoke(array $config)
    {
        $sdkParams = $config['sdk'];
        $tags = $config['tags'] ?? [ ];
        $name = $config['name'] ?? 'cloudwatch';

        // Instantiate AWS SDK CloudWatch Logs Client
        $client = new CloudWatchLogsClient($sdkParams);

        // Log group name, will be created if none
        $groupName = 'php-logtest';

        // Log stream name, will be created if none
        $streamName = config('app.name');

        // Days to keep logs, 14 by default. Set to `null` to allow indefinite retention.
        $retentionDays = 30;

        // Instantiate handler (tags are optional)
        $handler = new CloudWatch($client, $groupName, $streamName, $retentionDays, 0, $tags);

        // Optionally set the JsonFormatter to be able to access your log messages in a structured way
        $handler->setFormatter(new JsonFormatter());

        // Create a log channel
        $log = new Logger($name);

        // Set handler
        $log->pushHandler($handler);

        // Add records to the log
        $log->debug('Foo');
        $log->warning('Bar');
        $log->error('Baz');

        return $log;
    }

}
