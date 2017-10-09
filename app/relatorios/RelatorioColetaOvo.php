<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelatorioColetaOvo extends Model {

    protected $fillable = [
        "id",
        "dataInicio",
        "dataFinal"
    ];

}
