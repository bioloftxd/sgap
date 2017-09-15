<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelatorioAquisicaoAve extends Model {

    protected $fillable = [
        "id",
        "dataInicial",
        "dataFinal"
    ];

}
