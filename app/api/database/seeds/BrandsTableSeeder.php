<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'id' => 1,
            'name' => 'Geen',
        ]);
        DB::table('brands')->insert([
            'id' => 2,
            'name' => 'AH',
        ]);
        DB::table('brands')->insert([
            'id' => 3,
            'name' => 'Aldi',
        ]);
        DB::table('brands')->insert([
            'id' => 4,
            'name' => 'Jumbo',
        ]);
        DB::table('brands')->insert([
            'id' => 5,
            'name' => 'Becel',
        ]);
    }
}
