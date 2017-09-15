<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColetaOvo extends Model {

    protected $fillable = [
        "id",
        "data",
        "hora",
        "quantidade_coletado",
        "quantidade_quebrado",
        "id_usuario",
        "observacoes",
        "ativo"
    ];
    protected $table = "coleta_ovo";

    public function usuario() {
        return $this->hasOne(Usuario::class, "id", "id_usuario");
    }

}
