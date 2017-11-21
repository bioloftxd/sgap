<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FuncaoSeed::class);
        $this->call(UsuarioSeed::class);
        $this->call(AlimentacaoSeed::class);
    }
}
