<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{

    protected $fillable = [
        "id",
        "quantidade",
        "ativo",
        "preco",
        "id_produto"
    ];
    protected $table = "estoque";

    public function produto()
    {
        return $this->hasOne(Produto::class, "id", "id_produto");
    }

}
