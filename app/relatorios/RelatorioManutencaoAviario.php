<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelatorioManutencaoAviario extends Model {

    protected $fillable = [
        "id",
        "dataInicio",
        "dataFinal"
    ];

}
