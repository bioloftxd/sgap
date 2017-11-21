<?php

use Illuminate\Database\Seeder;
use App\Funcao;
use Illuminate\Support\Facades\DB;

class FuncaoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('funcao')->truncate();
        Funcao::create([
            "id" => 1,
            "funcao" => 'administrador',
            "observacoes" => 'Usuário com acesso total ao sistema.',
            "ativo" => 1
        ]);
        Funcao::create([
            "id" => 2,
            "funcao" => 'convidado',
            "observacoes" => 'Usuário com acesso restrito à visualização de registros.',
            "ativo" => 1
        ]);
    }
}