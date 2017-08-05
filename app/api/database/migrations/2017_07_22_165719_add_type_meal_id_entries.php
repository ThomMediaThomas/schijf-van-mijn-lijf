<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeMealIdEntries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entries', function (Blueprint $table) {
            $table->enum('type', ['product', 'meal', 'quick'])->after('id');

            $table->string('name')->before('product_id')->nullable();

            $table->integer('meal_id')->after('product_id')->unsigned()->index()->nullable();

            $table->integer('calories')->before('portion_id')->nullable();
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
