<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManutencaoAviario extends Model
{

    protected $fillable = [
        "id",
        "data_verifica",
        "hora_verifica",
        "data_resolve",
        "hora_resolve",
        "numero_relatorio",
        "id_usuario_verifica",
        "id_usuario_resolve",
        "ocorrencia",
        "resolucao",
        "resolvido",
        "ativo"
    ];
    protected $table = "manutencao_aviario";

    public function usuarioVerifica()
    {
        return $this->belongsTo(Usuario::class, "id_usuario_verifica", "id");
    }

    public function usuarioResolve()
    {
        return $this->belongsTo(Usuario::class, "id_usuario_resolve", "id");
    }

}
