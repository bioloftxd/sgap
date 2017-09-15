<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmbalaOvo extends Model {

    protected $fillable = [
        "id",
        "data",
        "hora",
        "lote",
        "quantidade",
        "id_tipo_embalagem",
        "id_usuario",
        "observacoes",
        "ativo"
    ];
    protected $table = "embala_ovo";

    public function usuario() {
        return $this->hasOne(Usuario::class, "id", "id_usuario");
    }

    public function tipo_embalagem() {
        return $this->hasOne(TipoEmbalagem::class, "id", "id_tipo_embalagem");
    }

}
