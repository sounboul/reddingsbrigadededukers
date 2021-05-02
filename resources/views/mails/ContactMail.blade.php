<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact: {{ $data['name'] }} - De Dukers</title>
</head>
<body>
    <h1>{{ $data['name'] }}, bedankt voor je bericht.</h1>
    <p>Hieronder kun je teruglezen wat je hebt ingevuld:</p>
    <p>{{ $data['email'] }}</p>
    <p>{{ $data['diploma'] }}</p>
    <p>{{ $data['dateofbirth'] }}</p>
    <p>{{ $data['date'] }}</p>
    <p>{{ $data['message'] }}</p>
</body>
</html>
