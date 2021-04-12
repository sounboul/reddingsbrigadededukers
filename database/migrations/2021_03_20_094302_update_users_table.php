<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function( Blueprint $table) {
            $table->string('username');
            $table->string('firstname');
            $table->string('tussenvoegsel')->nullable();
            $table->string('lastname');
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_instructor')->default(false);
            $table->boolean('is_groupeditor')->default(false);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function( Blueprint $table) {
            $table->dropColumn(['username', 'firstname', 'tussenvoegsel',
                'lastname', 'is_admin', 'is_instructor', 'is_groupeditor']);
        });
    }
}
