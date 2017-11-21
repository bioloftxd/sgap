<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlimentacaoAve extends Model
{

    protected $fillable = [
        "id",
        "data",
        "hora",
        "quantidade_alimento",
        "tipo_racao",
        "id_usuario",
        "observacoes",
        "ativo"
    ];
    protected $table = "alimentacao_aves";

    public function usuario()
    {
        return $this->hasOne(Usuario::class, "id", "id_usuario");
    }

}
