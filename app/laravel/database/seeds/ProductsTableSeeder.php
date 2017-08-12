<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'id' => 1,
            'name' => 'Brood',
            'image' => '/files/images/brood.jpg',
            'calories' => 200,
            'subcategory_id' => 10,
            'brand_id' => 1,
        ]);
        DB::table('products')->insert([
            'id' => 2,
            'name' => 'Halvarine',
            'image' => '/files/images/halvarine.jpg',
            'calories' => 300,
            'subcategory_id' => 3,
            'brand_id' => 4,
        ]);
        DB::table('products')->insert([
            'id' => 3,
            'name' => 'Lijnzaad',
            'image' => '/files/images/lijnzaad.jpg',
            'calories' => 500,
            'subcategory_id' => 9,
            'brand_id' => 1,
        ]);
        DB::table('products')->insert([
            'id' => 4,
            'name' => 'Conference peer',
            'image' => '/files/images/peer.jpg',
            'calories' => 100,
            'subcategory_id' => 2,
            'brand_id' => 1,
        ]);
        DB::table('products')->insert([
            'id' => 5,
            'name' => 'Tomaat',
            'image' => '/files/images/tomaat.jpg',
            'calories' => 20,
            'subcategory_id' => 1,
            'brand_id' => 1,
        ]);
        DB::table('products')->insert([
            'id' => 6,
            'name' => 'Ham',
            'image' => '/files/images/ham.jpg',
            'calories' => 130,
            'subcategory_id' => 6,
            'brand_id' => 1,
        ]);
        DB::table('products')->insert([
            'id' => 7,
            'name' => 'Yoghurt',
            'image' => '/files/images/yoghurt.jpg',
            'calories' => 44,
            'subcategory_id' => 8,
            'brand_id' => 2,
        ]);
        DB::table('products')->insert([
            'id' => 8,
            'name' => 'Bloemkool',
            'image' => '/files/images/bloemkool.jpg',
            'calories' => 36,
            'subcategory_id' => 1,
            'brand_id' => 1,
        ]);
        DB::table('products')->insert([
            'id' => 9,
            'name' => 'Kipfilet',
            'image' => '/files/images/kipfilet.jpg',
            'calories' => 158,
            'subcategory_id' => 6,
            'brand_id' => 1,
        ]);
        DB::table('products')->insert([
            'id' => 10,
            'name' => 'American Potatoes',
            'image' => '/files/images/american-potatoes.jpg',
            'calories' => 113,
            'subcategory_id' => 12,
            'brand_id' => 1,
        ]);
        DB::table('products')->insert([
            'id' => 11,
            'name' => 'Sla',
            'image' => '/files/images/sla.jpg',
            'calories' => 10,
            'subcategory_id' => 1,
            'brand_id' => 1,
        ]);
        DB::table('products')->insert([
            'id' => 12,
            'name' => 'Ketchup',
            'image' => '/files/images/ketchup.jpg',
            'calories' => 92,
            'subcategory_id' => 15,
            'brand_id' => 1,
        ]);
        DB::table('products')->insert([
            'id' => 13,
            'name' => 'Jonge kaas',
            'image' => '/files/images/kaas.jpg',
            'calories' => 269,
            'subcategory_id' => 8,
            'brand_id' => 1,
        ]);
    }
}
