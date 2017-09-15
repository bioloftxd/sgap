<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaFornecedor extends Migration {

    public function up() {
        Schema::create('fornecedor', function (Blueprint $table) {
            $table->increments('id'); //Id de cadastro
            $table->string("nome"); //Nome do fornecedor
            $table->string("cpf_cnpj"); //CPF ou CNPJ do fornecedor
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('fornecedor');
    }

}
