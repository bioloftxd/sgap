<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaAlimentacaoAves extends Migration {

    public function up() {
        Schema::create("alimentacao_aves", function (Blueprint $table) {
            $table->increments("id"); //Id de cadastro
            $table->date("data"); //Data de alimentação
            $table->time("hora"); //Hora de alimentação
            $table->bigInteger("numero_gaiola"); //Número de gaiolas que receberam alimento
            $table->decimal("quantidade_alimento", 15, 2); //Quantidade de alimento distribuido
            $table->integer("id_tipo_racao")->unsigned(); //Tipo de alimento distribuido
            $table->foreign("id_tipo_racao")->references("id")->on("tipo_racao");
            $table->integer("id_gaiola")->unsigned(); //Id da gaiola que recebeu alimento
            $table->foreign("id_gaiola")->references("id")->on("gaiola");
            $table->integer("id_usuario")->unsigned(); //Id de usuário autenticado
            $table->foreign("id_usuario")->references("id")->on("usuario");
            $table->string("observacoes"); //Observações sobre alimentação
            $table->boolean("ativo")->default(1); //Exclusão simulada
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists("alimentacao_aves");
    }

}
