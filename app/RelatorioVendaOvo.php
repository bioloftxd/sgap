<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelatorioVendaOvo extends Model {

    protected $fillable = [
        "id",
        "dataInicio",
        "dataFinal"
    ];

}
