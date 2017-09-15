<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaEstoque extends Migration {

    public function up() {
        Schema::create('estoque', function (Blueprint $table) {
            $table->increments('id'); //Id de cadastro
            $table->decimal("quantidade", 15, 2); //Quantidade de produtos
            $table->integer("id_produto")->unsigned(); //Id do produto
            $table->foreign("id_produto")->references("id")->on("produto");
            $table->boolean("ativo"); //Exclusão simulada
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('estoque');
    }

}
