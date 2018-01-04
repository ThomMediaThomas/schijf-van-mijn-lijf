<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'name' => 'Groenten en fruit',
            'system_name' => 'vegetables'
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'name' => 'Smeer- en bereidingsvetten',
            'system_name' => 'fats'
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'name' => 'Vis, peulvruchten, vlees, ei, noten en zuivel',
            'system_name' => 'meats'
        ]);
        DB::table('categories')->insert([
            'id' => 4,
            'name' => 'Brood, graanproducten en aardappelen',
            'system_name' => 'wheats'
        ]);
        DB::table('categories')->insert([
            'id' => 5,
            'name' => 'Dranken',
            'system_name' => 'drinks'
        ]);
        DB::table('categories')->insert([
            'id' => 6,
            'name' => 'Niet in de schijf van vijf',
            'system_name' => 'unneeded'
        ]);
        DB::table('categories')->insert([
            'id' => 7,
            'name' => 'Gemengd',
            'system_name' => 'mixed'
        ]);
    }
}
