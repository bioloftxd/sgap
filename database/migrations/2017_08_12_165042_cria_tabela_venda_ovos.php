<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaVendaOvos extends Migration {

    public function up() {
        Schema::create("venda_ovos", function (Blueprint $table) {
            $table->increments("id"); //Id de cadastro
            $table->date("data_venda"); //Data de venda
            $table->time("hora_venda"); //Hora de venda
            $table->integer("quantidade"); //Quantidade de venda
            $table->string("nome_comprador"); //Nome do comprador
            $table->integer("lote"); //Lote de embalagem vendida
            $table->integer("id_tipo_embalagem")->unsigned(); //Tipo de embalagem
            $table->foreign("id_tipo_embalagem")->references("id")->on("tipo_embalagem");
            $table->integer("id_usuario")->unsigned(); //Usuário autenticado
            $table->foreign("id_usuario")->references("id")->on("usuario");
            $table->string("observacoes"); //Observações sobre venda
            $table->boolean("ativo")->default(1); //Exclusão simulada
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists("venda_ovos");
    }

}
