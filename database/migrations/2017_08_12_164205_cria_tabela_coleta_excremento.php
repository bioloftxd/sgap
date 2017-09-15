<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaColetaExcremento extends Migration {

    public function up() {
        Schema::create("coleta_excremento", function (Blueprint $table) {
            $table->increments("id"); //Id de cadastro
            $table->date("data"); //Data de coleta
            $table->time("hora"); //Hora de data
            $table->decimal("litros", 15, 2); //Quantidade de excremento coletado
            $table->integer("id_usuario")->unsigned(); //Usuario autenticado
            $table->foreign("id_usuario")->references("id")->on("usuario");
            $table->string("observacoes"); //Observacoes sobre coleta de excremento
            $table->boolean("ativo")->default(1); //Exclusão simulada
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists("coleta_excremento");
    }

}
