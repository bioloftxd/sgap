<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoRacao extends Model
{

    protected $fillable = [
        "id",
        "tipo",
        "id_produto",
        "ativo"
    ];
    protected $table = "tipo_racao";

    public function produto()
    {
        return $this->hasMany(Produto::class, "id", "id_produto");
    }

}
