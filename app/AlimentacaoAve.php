<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlimentacaoAve extends Model
{

    protected $fillable = [
        "id",
        "data",
        "hora",
        "id_gaiola",
        "quantidade_alimento",
        "id_tipo_racao",
        "id_usuario",
        "observacoes",
        "ativo"
    ];
    protected $table = "alimentacao_aves";

    public function usuario()
    {
        return $this->hasOne(Usuario::class, "id", "id_usuario");
    }

    public function tipo_racao()
    {
        return $this->hasMany(TipoRacao::class, "id", "id_tipo_racao");
    }

    public function gaiola()
    {
        return $this->hasMany(Gaiola::class, "id", "id_gaiola");
    }

}
