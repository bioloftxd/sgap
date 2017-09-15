<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelatorioColetaExcremento extends Model {

    protected $fillable = [
        "id",
        "dataInicio",
        "dataFinal"
    ];

}
