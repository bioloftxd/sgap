<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AquisicaoAve extends Model {

    protected $fillable = [
        "id",
        "data_chegada",
        "hora_chegada",
        "data_saida",
        "hora_saida",
        "numero_gta",
        "numero_nf",
        "quantidade_total",
        "quantidade_morta",
        "raca",
        "vacinas",
        "idade",
        "id_usuario",
        "observacoes",
        "ativo"
    ];
    protected $table = "aquisicao_ave";

    public function usuario() {
        return $this->hasOne(Usuario::class, "id", "id_usuario");
    }

}
