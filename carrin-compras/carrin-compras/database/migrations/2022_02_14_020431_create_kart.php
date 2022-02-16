<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kart', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->double("valor_produto");
            $table->integer("quantidade");
            $table->date("dt_termino")->nullable();
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
        Schema::dropIfExists('valor_produto');
        Schema::dropIfExists('dt_termino');
        Schema::dropIfExists('kart');
    }
}
