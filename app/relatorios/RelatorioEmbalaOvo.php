<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelatorioEmbalaOvo extends Model {

    protected $fillable = [
        "id",
        "dataInicio",
        "dataFinal"
    ];

}
