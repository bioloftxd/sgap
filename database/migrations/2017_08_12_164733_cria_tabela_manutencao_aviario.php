<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaManutencaoAviario extends Migration {

    public function up() {
        Schema::create("manutencao_aviario", function (Blueprint $table) {
            $table->increments("id"); //Id de cadastro
            $table->date("data_verifica"); //Data de verificação
            $table->time("hora_verifica"); //Hora de verificação
            $table->date("data_resolve"); //Data de manutenção
            $table->time("hora_resolve"); //Hora de manutenção
            $table->integer("numero_relatorio"); //Número de relatório
            $table->integer("id_usuario_verifica")->unsigned(); //Usuário que identificou a alteração
            $table->foreign("id_usuario_verifica")->references("id")->on("usuario");
            $table->integer("id_usuario_resolve")->unsigned(); //Usuário que resolveu a alteração
            $table->foreign("id_usuario_resolve")->references("id")->on("usuario");
            $table->string("observacoes"); //Observações sobre manutenção
            $table->boolean("resolvido")->default(0); //Marcação de resolução 
            $table->boolean("ativo")->default(1); //Exclusão simulada
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists("manutencao_aviario");
    }

}
