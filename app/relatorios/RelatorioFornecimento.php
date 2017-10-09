<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelatorioFornecimento extends Model {

    protected $fillable = [
        "id",
        "dataInicio",
        "dataFinal"
    ];

}
