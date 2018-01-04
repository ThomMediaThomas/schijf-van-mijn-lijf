<?php

use Illuminate\Database\Seeder;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategories')->insert([
            'id' => 1,
            'category_id' => 1,
            'name' => 'Groenten',
            'system_name' => 'vegetables'
        ]);
        DB::table('subcategories')->insert([
            'id' => 2,
            'category_id' => 1,
            'name' => 'Fruit',
            'system_name' => 'fruits'
        ]);
        DB::table('subcategories')->insert([
            'id' => 3,
            'category_id' => 2,
            'name' => 'Smeer- en bereidingsvetten',
            'system_name' => 'fats'
        ]);
        DB::table('subcategories')->insert([
            'id' => 4,
            'category_id' => 3,
            'name' => 'Vis',
            'system_name' => 'fish'
        ]);
        DB::table('subcategories')->insert([
            'id' => 5,
            'category_id' => 3,
            'name' => 'Peulvruchten',
            'system_name' => 'beans'
        ]);
        DB::table('subcategories')->insert([
            'id' => 6,
            'category_id' => 3,
            'name' => 'Vlees',
            'system_name' => 'meats'
        ]);
        DB::table('subcategories')->insert([
            'id' => 7,
            'category_id' => 3,
            'name' => 'Eieren',
            'system_name' => 'eggs'
        ]);
        DB::table('subcategories')->insert([
            'id' => 8,
            'category_id' => 3,
            'name' => 'Zuivel',
            'system_name' => 'dairy'
        ]);
        DB::table('subcategories')->insert([
            'id' => 9,
            'category_id' => 3,
            'name' => 'Noten en zaden',
            'system_name' => 'seeds'
        ]);
        DB::table('subcategories')->insert([
            'id' => 10,
            'category_id' => 4,
            'name' => 'Brood',
            'system_name' => 'bread'
        ]);
        DB::table('subcategories')->insert([
            'id' => 11,
            'category_id' => 4,
            'name' => 'Graanproducten',
            'system_name' => 'wheats'
        ]);
        DB::table('subcategories')->insert([
            'id' => 12,
            'category_id' => 4,
            'name' => 'Aardappelen',
            'system_name' => 'potatoes'
        ]);
        DB::table('subcategories')->insert([
            'id' => 13,
            'category_id' => 5,
            'name' => 'Koffie en thee',
            'system_name' => 'coffee'
        ]);
        DB::table('subcategories')->insert([
            'id' => 14,
            'category_id' => 5,
            'name' => 'Water',
            'system_name' => 'water'
        ]);
        DB::table('subcategories')->insert([
            'id' => 15,
            'category_id' => 6,
            'name' => 'Niet nodig',
            'system_name' => 'unneeded'
        ]);
        DB::table('subcategories')->insert([
            'id' => 16,
            'category_id' => 6,
            'name' => 'Snoep & snacks',
            'system_name' => 'candy'
        ]);
        DB::table('subcategories')->insert([
            'id' => 17,
            'category_id' => 7,
            'name' => 'Maaltijd',
            'system_name' => 'food'
        ]);
        DB::table('subcategories')->insert([
            'id' => 18,
            'category_id' => 7,
            'name' => 'Samengesteld broodbeleg',
            'system_name' => 'sandwich'
        ]);
    }
}
