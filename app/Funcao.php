<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcao extends Model {

    protected $fillable = [
        "id",
        "funcao",
        "observacoes",
        "ativo"
    ];
    protected $table = "funcao";

}
