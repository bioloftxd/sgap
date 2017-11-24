<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaVendaOvos extends Migration
{

    public function up()
    {
        Schema::create("venda_ovos", function (Blueprint $table) {
            $table->increments("id"); //Id de cadastro
            $table->date("data_venda"); //Data de venda
            $table->time("hora_venda"); //Hora de venda
            $table->integer("quantidade"); //Quantidade de venda
            $table->string("nome_comprador"); //Nome do comprador
            $table->integer("lote"); //Lote de embalagem vendida
            $table->decimal("preco", 15, 2); //Preço de venda
            $table->string("tipo_embalagem"); //Tipo de embalagem
            $table->integer("id_usuario")->unsigned(); //Usuário autenticado
            $table->foreign("id_usuario")->references("id")->on("usuario");
            $table->string("observacoes"); //Observações sobre venda
            $table->boolean("ativo")->default(1); //Exclusão simulada
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists("venda_ovos");
    }

}
