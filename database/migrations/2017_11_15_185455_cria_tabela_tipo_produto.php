<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaTipoProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TipoProduto', function (Blueprint $table) {
            $table->increments('id'); //Id de cadastro
            $table->string('tipo'); //Tipo de produto
            $table->boolean("ativo")->default(1); //Exclusão simulada
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TipoProduto');
    }
}
