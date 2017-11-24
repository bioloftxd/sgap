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
        "tipo_embalagem",
        "id_usuario",
        "observacoes",
        "ativo"
    ];
    protected $table = "venda_ovos";

    public function usuario()
    {
        return $this->hasOne(Usuario::class, "id", "id_usuario");
    }

}
