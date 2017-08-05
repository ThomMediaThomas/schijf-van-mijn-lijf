<?php

use Illuminate\Database\Seeder;

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
            'username' => 'thomas',
            'firstname' => 'Thomas',
            'lastname' => 'Bartels',
            'email' => 'bartels_thomas@hotmail.com',
            'password' => 'thomas'
        ]);

        DB::table('users')->insert([
            'username' => 'danny',
            'firstname' => 'Danny',
            'lastname' => 'Venema',
            'email' => 'dannyvenema@hotmail.com',
            'password' => 'danny'
        ]);
    }
}
