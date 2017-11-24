<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecimento extends Model
{

    protected $fillable = [
        "id",
        "lote",
        "quantidade",
        "data_fornecimento",
        "preco",
        "data_fabricacao",
        "data_validade",
        "numero_nf",
        "observacoes",
        "ativo",
        "id_produto",
        "id_usuario",
        "id_fornecedor"
    ];
    protected $table = "fornecimento";

    public function produto()
    {
        return $this->hasOne(Produto::class, "id", "id_produto");
    }

    public function usuario()
    {
        return $this->hasOne(Usuario::class, "id", "id_usuario");
    }

    public function fornecedor()
    {
        return $this->hasOne(Fornecedor::class, "id", "id_fornecedor");
    }

}
