<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelatorioMortalidadeAve extends Model {

    protected $fillable = [
        "id",
        "dataInicio",
        "dataFinal"
    ];

}
