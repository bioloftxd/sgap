<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaEstoque extends Migration {

    public function up() {
        Schema::create('estoque', function (Blueprint $table) {
            $table->increments('id'); //Id de cadastro
            $table->decimal("quantidade", 15, 2); //Quantidade de produtos
            $table->decimal("preco", 15, 2); //Preço unitário do produto
            $table->integer("id_produto")->unsigned(); //Id do produto
            $table->foreign("id_produto")->references("id")->on("produto");
            $table->boolean("ativo")->default(1); //Exclusão simulada
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('estoque');
    }

}
