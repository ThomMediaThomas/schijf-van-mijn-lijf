<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpenfoodfactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('open_food_facts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->string('generic_name');
            $table->string('brands');
            $table->string('categories');
            $table->string('energy');
            $table->string('proteins');
            $table->string('fat');
            $table->string('carb');
            $table->string('image');
            $table->string('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
