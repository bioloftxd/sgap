<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Autenticacao extends Controller {

    public function autentica() {
        return view("inicio");
    }

}
