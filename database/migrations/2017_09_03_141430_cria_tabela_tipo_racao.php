<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaTipoRacao extends Migration {

    public function up() {
        Schema::create('tipo_racao', function (Blueprint $table) {
            $table->increments('id'); //Id de cadastro
            $table->string("tipo"); //Tipo de ração
            $table->integer("id_produto")->unsigned(); //Id da ração no estoque
            $table->foreign("id_produto")->references("id")->on("produto");
            $table->boolean("ativo")->default(1); //Exclusão simulada
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('tipo_racao');
    }

}
