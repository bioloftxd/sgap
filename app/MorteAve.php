<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MorteAve extends Model
{

    protected $fillable = [
        "id",
        "data",
        "hora",
        "id_gaiola",
        "quantidade_aves",
        "id_usuario",
        "observacoes",
        "ativo",
        "visualizado"
    ];
    protected $table = "morte_aves";

    public function usuario()
    {
        return $this->hasOne(Usuario::class, "id", "id_usuario");
    }

    public function gaiola()
    {
        return $this->hasOne(Gaiola::class, "id", "id_gaiola");
    }

}
