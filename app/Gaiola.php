<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gaiola extends Model {

    protected $fillable = [
        "id",
        "numero_gaiola",
        "quantidade_aves",
        "ativo"
    ];
    protected $table = "gaiola";

}
