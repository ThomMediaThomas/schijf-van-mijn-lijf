<?php

use Illuminate\Database\Seeder;

class PortionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('portions')->insert([
            'name' => 'Snee',
            'unit' => 'gr', //ml or gr
            'size' => 40,
            'product_id' => 1
        ]);
        DB::table('portions')->insert([
            'name' => 'Mespunt (klein)',
            'unit' => 'gr', //ml or gr
            'size' => 5,
            'product_id' => 2
        ]);
        DB::table('portions')->insert([
            'name' => 'Mespunt (groot)',
            'unit' => 'gr', //ml or gr
            'size' => 10,
            'product_id' => 2
        ]);
        DB::table('portions')->insert([
            'name' => 'Theelepel',
            'unit' => 'gr', //ml or gr
            'size' => 10,
            'product_id' => 3
        ]);
        DB::table('portions')->insert([
            'name' => 'Eetlepel',
            'unit' => 'gr', //ml or gr
            'size' => 30,
            'product_id' => 3
        ]);
        DB::table('portions')->insert([
            'name' => 'Stuk',
            'unit' => 'gr', //ml or gr
            'size' => 80,
            'product_id' => 4
        ]);
        DB::table('portions')->insert([
            'name' => 'Stuk',
            'unit' => 'gr', //ml or gr
            'size' => 80,
            'product_id' => 5
        ]);
        DB::table('portions')->insert([
            'name' => 'Plak',
            'unit' => 'gr', //ml or gr
            'size' => 20,
            'product_id' => 6
        ]);
        DB::table('portions')->insert([
            'name' => 'Kommetje (klein)',
            'unit' => 'ml', //ml or gr
            'size' => 150,
            'product_id' => 7
        ]);
        DB::table('portions')->insert([
            'name' => 'Kommetje (groot)',
            'unit' => 'ml', //ml or gr
            'size' => 250,
            'product_id' => 7
        ]);
        DB::table('portions')->insert([
            'name' => 'Portie',
            'unit' => 'gr', //ml or gr
            'size' => 100,
            'product_id' => 8
        ]);
        DB::table('portions')->insert([
            'name' => 'Halve bloemkool',
            'unit' => 'gr', //ml or gr
            'size' => 250,
            'product_id' => 8
        ]);
        DB::table('portions')->insert([
            'name' => 'Portie',
            'unit' => 'gr', //ml or gr
            'size' => 100,
            'product_id' => 9
        ]);
        DB::table('portions')->insert([
            'name' => 'Opscheplepel (klein)',
            'unit' => 'gr', //ml or gr
            'size' => 70,
            'product_id' => 10
        ]);
        DB::table('portions')->insert([
            'name' => 'Opscheplepel (groot)',
            'unit' => 'gr', //ml or gr
            'size' => 100,
            'product_id' => 10
        ]);
        */
        DB::table('portions')->insert([
            'name' => 'Opscheplepel (klein)',
            'unit' => 'gr', //ml or gr
            'size' => 70,
            'product_id' => 11
        ]);
        DB::table('portions')->insert([
            'name' => 'Opscheplepel (groot)',
            'unit' => 'gr', //ml or gr
            'size' => 100,
            'product_id' => 11
        ]);
        DB::table('portions')->insert([
            'name' => 'Theelepel',
            'unit' => 'gr', //ml or gr
            'size' => 10,
            'product_id' => 12
        ]);
        DB::table('portions')->insert([
            'name' => 'Eetlepel',
            'unit' => 'gr', //ml or gr
            'size' => 30,
            'product_id' => 12
        ]);
        DB::table('portions')->insert([
            'name' => 'Plak',
            'unit' => 'gr', //ml or gr
            'size' => 20,
            'product_id' => 13
        ]);
        DB::table('portions')->insert([
            'name' => 'Blokje',
            'unit' => 'gr', //ml or gr
            'size' => 30,
            'product_id' => 13
        ]);
    }
}
