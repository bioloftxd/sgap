<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelatorioProdutos extends Model {

    protected $fillable = [
        "id",
        "dataInicio",
        "dataFinal"
    ];

}
