<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{

    protected $fillable = [
        "id",
        "nome",
        "cpf_cnpj"
    ];
    protected $table = "fornecedor";

    public function fornecimento()
    {
        return $this->belongsTo(Fornecimento::class, "id_fornecedor", "id");
    }

}
