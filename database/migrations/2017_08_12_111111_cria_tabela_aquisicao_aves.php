<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaAquisicaoAves extends Migration
{

    public function up()
    {
        Schema::create("aquisicao_aves", function (Blueprint $table) {
            $table->increments("id"); //Id de cadastro
            $table->date("data_chegada"); //Data de chegada do carregamento ao aviário
            $table->time("hora_chegada"); //Hora de chegada do carregamento ao aviário
            $table->date("data_saida"); //Data de saída do destino do carregamento
            $table->time("hora_saida"); //Hora de saída do destino do carregamento
            $table->string("numero_gta"); //Número de guia de transporte animal
            $table->string("numero_nf"); //Número de nota fiscal
            $table->bigInteger("quantidade_total"); //Quantidade de aves no transporte
            $table->bigInteger("quantidade_morta"); //Quantidade de aves mortas no transporte
            $table->string("raca"); //Raça de aves transportadas
            $table->decimal("preco", 15, 2); //Preço total da aquisição
            $table->mediumText("vacinas"); //Vacinas aplicadas nas aves
            $table->integer("idade"); //Vacinas aplicadas nas aves
            $table->integer("id_usuario")->unsigned(); //Usuário autenticado
            $table->foreign("id_usuario")->references("id")->on("usuario");
            $table->string("observacoes"); //Observações sobre aquisição
            $table->boolean("ativo")->default(1); //Exclusão simulada
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists("aquisicao_aves");
    }

}
