<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaFornecimento extends Migration {

    public function up() {
        Schema::create('fornecimento', function (Blueprint $table) {
            $table->increments('id'); //Id de cadastro
            $table->string("lote"); //Lote do produto fornecido
            $table->decimal("quantidade", 15, 2); //Quantidade de entrada
            $table->date("data_fornecimento"); //Data do fornecimento
            $table->decimal("preco", 15, 2); //Preço unitário do produto
            $table->date("data_fabricacao"); //Data fabricação do produto
            $table->date("data_validade"); //Data validade do produto
            $table->string("numero_nf"); //Número da nota fiscal
            $table->string("observacoes"); //Observacoes sobre fornecimento
            $table->integer("id_produto")->unsigned(); //Id do produto fornecido
            $table->foreign("id_produto")->references("id")->on("produto");
            $table->integer("id_usuario")->unsigned(); //Usuário autenticado
            $table->foreign("id_usuario")->references("id")->on("usuario");
            $table->integer("id_fornecedor")->unsigned(); //Id fornecedor
            $table->foreign("id_fornecedor")->references("id")->on("fornecedor");
            $table->boolean("ativo")->default(1); //Exclusão simulada
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('fornecimento');
    }

}
