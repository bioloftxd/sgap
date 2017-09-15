<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {

    protected $fillable = [
        "id",
        "nome",
        "nome_usuario",
        "senha",
        "id_funcao",
        "hora_login",
        "tentativas",
        "ativo"
    ];
    protected $table = "usuario";

    public function funcao() {
        return $this->hasOne(Funcao::class, "id", "id_funcao");
    }

}
