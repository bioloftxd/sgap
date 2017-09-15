<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaVentilacao extends Migration {

    public function up() {
        Schema::create("ventilacao", function (Blueprint $table) {
            $table->increments("id"); //Id de cadastro
            $table->date("data_abertura"); //Data de abertura das cortinas
            $table->time("hora_abertura"); //Hora de abertura das cortinas
            $table->date("data_fechamento"); //Data de fechamento das cortinas
            $table->time("hora_fechamento"); //Hora de fechamento das cortinas
            $table->decimal("temperatura_maxima", 15, 2); //Temperatura máxima atingida
            $table->decimal("temperatura_minima", 15, 2); //Temperatura mínima atingida
            $table->decimal("temperatura_atual", 15, 2); //Temperatura atual
            $table->integer("id_usuario")->unsigned(); //Usuário autenticado
            $table->foreign("id_usuario")->references("id")->on("usuario");
            $table->string("observacoes"); //Observações sobre ventilação
            $table->boolean("ativo")->default(1); //Exclusão simulada
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists("ventilacao");
    }

}
