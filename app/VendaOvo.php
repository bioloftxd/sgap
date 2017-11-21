<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendaOvo extends Model
{

    protected $fillable = [
        "id",
        "data_venda",
        "hora_venda",
        "quantidade",
        "nome_comprador",
        "lote",
        "preco",
        "id_tipo_embalagem",
        "id_usuario",
        "observacoes",
        "ativo"
    ];
    protected $table = "venda_ovo";

    public function tipo_embalagem()
    {
        return $this->hasOne(TipoEmbalagem::class, "id", "id_tipo_embalagem");
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, "id", "id_usuario");
    }

}
