<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelatorioCustoGeral extends Model {

    protected $fillable = [
        "id",
        "dataInicio",
        "dataFinal"
    ];

}
