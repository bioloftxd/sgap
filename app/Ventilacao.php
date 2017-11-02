<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventilacao extends Model
{

    protected $fillable = [
        "id",
        "data_abertura",
        "hora_abertura",
        "data_fechamento",
        "hora_fechamento",
        "temperatura_maxima",
        "temperatura_minima",
        "id_usuario",
        "observacoes",
        "ativo"
    ];
    protected $table = "ventilacao";

    public function usuario()
    {
        return $this->hasOne(Usuario::class, "id", "id_usuario");
    }

}
