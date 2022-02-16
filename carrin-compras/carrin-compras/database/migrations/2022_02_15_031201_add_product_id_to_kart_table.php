<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductIdToKartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kart', function (Blueprint $table) {
            $table->biginteger('product_id', false, true)->nullable(false);
            $table->biginteger('order_id', false, true)->nullable();
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('order_id')->references('id')->on('order');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kart', function (Blueprint $table) {
            //
            Schema::dropIfExists('product_id');
            Schema::dropIfExists('order_id');
        });
    }
}
