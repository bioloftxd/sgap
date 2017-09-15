<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColetaExcremento extends Model {

    protected $fillable = [
        "id",
        "data",
        "hora",
        "litros",
        "id_usuario",
        "observacoes",
        "ativo"
    ];
    protected $table = "coleta_excremento";

    public function usuario() {
        return $this->hasOne(Usuario::class, "id", "id_usuario");
    }

}
