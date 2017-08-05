<?php

use Illuminate\Database\Seeder;

class DaypartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dayparts')->insert([
            'id' => 1,
            'name' => 'Ontbijt',
            'from' => '00:00',
            'until' => '10:00',
        ]);
        DB::table('dayparts')->insert([
            'id' => 2,
            'name' => 'Snacks - ochtend',
            'from' => '10:00',
            'until' => '12:00',
        ]);
        DB::table('dayparts')->insert([
            'id' => 3,
            'name' => 'Lunch',
            'from' => '12:00',
            'until' => '14:00',
        ]);
        DB::table('dayparts')->insert([
            'id' => 4,
            'name' => 'Snacks - middag',
            'from' => '14:00',
            'until' => '17:00',
        ]);
        DB::table('dayparts')->insert([
            'id' => 5,
            'name' => 'Diner',
            'from' => '17:00',
            'until' => '20:00',
        ]);
        DB::table('dayparts')->insert([
            'id' => 6,
            'name' => 'Snacks - avond',
            'from' => '20:00',
            'until' => '23:59',
        ]);
    }
}
