<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{

    protected $fillable = [
        "id",
        "nome",
        "marca",
        "tipo_produto",
        "observacoes",
        "ativo"
    ];
    protected $table = "produto";

}
