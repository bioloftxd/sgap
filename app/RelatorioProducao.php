<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelatorioProducao extends Model {

    protected $fillable = [
        "id",
        "dataInicio",
        "dataFinal"
    ];

}
