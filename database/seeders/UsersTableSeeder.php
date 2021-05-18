<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'firstname' => 'voornaam',
            'lastname' => 'achternaam',
            'password' => bcrypt('geheimwachtwoord'),
            'is_active' => true,
            'is_admin' => true,
            'is_instructor' => true,
            'is_groupeditor' => true,
        ]);
    }
}
