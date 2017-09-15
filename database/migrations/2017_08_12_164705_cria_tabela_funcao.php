<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaFuncao extends Migration {

    public function up() {
        Schema::create("funcao", function (Blueprint $table) {
            $table->increments("id"); //Id de cadastro
            $table->string("funcao"); //Função de usuário
            $table->string("observacoes"); //Observações sobre função
            $table->boolean("ativo")->default(1); //Exclusão simulada
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists("funcao");
    }

}
