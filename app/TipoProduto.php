<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProduto extends Model
{
    protected $fillable = [
        "id",
        "tipo",
        "observacoes",
        "ativo"
    ];

    protected $table = "tipo_produto";

    public function produto()
    {
        return $this->hasMany(Produto::class, "id");
    }
}
