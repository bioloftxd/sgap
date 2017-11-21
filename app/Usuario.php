<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    protected $fillable = [
        "id",
        "nome",
        "usuario",
        "senha",
        "id_funcao",
        "ativo"
    ];
    protected $table = "usuario";

    public function funcao()
    {
        return $this->belongsTo(Funcao::class, "id_funcao", "id");
    }
}
