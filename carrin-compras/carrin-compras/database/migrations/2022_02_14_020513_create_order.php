<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date("dt_cadastro");
            $table->date("dt_termino")->nullable();
            $table->date("dt_cancelamento")->nullable();
            $table->double("total");
            $table->biginteger('user_id', false, true)->nullable(false);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
        Schema::dropIfExists('dt_cadastro');
        Schema::dropIfExists('dt_termino');
        Schema::dropIfExists('total');
    
    }
}
