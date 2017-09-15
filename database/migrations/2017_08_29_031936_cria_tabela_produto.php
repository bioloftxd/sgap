<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaProduto extends Migration {

    public function up() {
        Schema::create('produto', function (Blueprint $table) {
            $table->increments('id'); //Id de cadastro
            $table->string("nome"); //Nome do produto
            $table->string("marca"); //Marca do produto
            $table->string("observacoes"); //Observações sobre produto
            $table->boolean("ativo")->default(1); //Exclusão simulada
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('produto');
    }

}
