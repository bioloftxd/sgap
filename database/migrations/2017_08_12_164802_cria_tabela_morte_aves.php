<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaMorteAves extends Migration {

    public function up() {
        Schema::create("morte_aves", function (Blueprint $table) {
            $table->increments("id"); //Id de cadastro
            $table->date("data"); //Data de verificação de morte
            $table->time("hora"); //Hora de verificação de morte
            $table->integer("id_gaiola")->unsigned(); //Id da gaiola da ocorrência
            $table->foreign("id_gaiola")->references("id")->on("gaiola");
            $table->integer("id_usuario")->unsigned(); //Usuário autenticado
            $table->foreign("id_usuario")->references("id")->on("usuario");
            $table->integer("quantidade_aves"); //Quantidade de aves mortas
            $table->string("observacoes"); //Observações sobre morte
            $table->boolean("ativo")->default(1); //Exclusão simulada
            $table->boolean("visualizado")->default(0); //Marcação de visualização por usuário responsável
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists("morte_aves");
    }

}
