<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{

    protected $fillable = [
        "id",
        "nome",
        "marca",
        "id_tipo_produto",
        "observacoes",
        "ativo"
    ];
    protected $table = "produto";

    public function tipoProduto()
    {
        return $this->belongsTo(TipoProduto::class, "id_tipo_produto", "id");
    }

}
