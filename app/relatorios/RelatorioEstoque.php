<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelatorioEstoque extends Model {

    protected $fillable = [
        "id",
        "dataInicio",
        "dataFinal"
    ];

}
