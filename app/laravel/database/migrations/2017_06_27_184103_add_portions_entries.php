<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPortionsEntries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entries', function (Blueprint $table) {
            $table->integer('portion_id')->nullable()->after('product_id')->unsigned()->index();
            $table->foreign('portion_id')->references('id')->on('portions')->onDelete('cascade');

            $table->decimal('amount', 8, 2)->nullable()->after('portion_id');
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
