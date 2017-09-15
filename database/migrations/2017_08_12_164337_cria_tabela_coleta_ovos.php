<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaColetaOvos extends Migration {

    public function up() {
        Schema::create("coleta_ovos", function (Blueprint $table) {
            $table->increments("id"); //Id de cadastro
            $table->date("data"); //Data de coleta
            $table->time("hora"); //Hora de coleta
            $table->integer("quantidade_coletado"); //Quantidade de ovos coletados
            $table->integer("quantidade_quebrado"); //Quantidade de ovos quebrados
            $table->integer("id_usuario")->unsigned(); //Id usuario  autenticado
            $table->foreign("id_usuario")->references("id")->on("usuario");
            $table->string("observacoes"); //Observações sobre coleta de ovos
            $table->boolean("ativo")->default(1); //Exclusão simulada
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists("coleta_ovos");
    }

}
