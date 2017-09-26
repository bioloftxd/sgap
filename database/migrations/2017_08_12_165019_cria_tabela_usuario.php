<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaUsuario extends Migration {

    public function up() {
        Schema::defaultStringLength(191);
        Schema::create("usuario", function (Blueprint $table) {
            $table->increments("id"); //Id de cadastro
            $table->string("nome"); //Nome completo
            $table->string("usuario")->unique(); //Nome de autenticação
            $table->string("senha"); //Senha de autenticação
            $table->integer("id_funcao")->unsigned()->default(2); //Id de função de usuário
            $table->foreign("id_funcao")->references("id")->on("funcao");

            $table->timestamp("data_login")->default("2011-09-11 23:23:23"); //Data de tentativa de autenticação;
            $table->integer("tentativas")->default("0"); //Número de tentativas de autenticação 
            //"UPDATE usuario SET tentativas = 0 WHERE hora < CURRENT_TIME;"

            $table->boolean("ativo")->default(1); //Exclusão simulada
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists("usuario");
    }

}
