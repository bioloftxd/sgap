<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmbalaOvo extends Model
{

    protected $fillable = [
        "id",
"data",
"hora",
"lote",
"quantidade_embalada",
"tipo_embalagem",
"id_usuario",
"observacoes",
        "ativo"
    ];
    protected $table = "embala_ovos";

    public function usuario()
    {
        return $this->hasOne(Usuario::class, "id", "id_usuario");
    }

}
