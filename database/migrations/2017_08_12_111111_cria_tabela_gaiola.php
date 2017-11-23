<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaGaiola extends Migration {

    public function up() {
        Schema::create('gaiola', function (Blueprint $table) {
            $table->increments('id'); //Id de cadastro;
            $table->integer("numero_gaiola"); //Número da gaiola
            $table->integer("quantidade_aves"); //Quantidade de aves
            $table->boolean("ativo")->default(1); //Exclusão simulada
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('gaiola');
    }

}
