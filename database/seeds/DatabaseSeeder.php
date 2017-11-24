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
        $this->call(AlimentacaoSeed::class);
        $this->call(AquisicaoSeed::class);
        $this->call(ColetaExcrementoSeed::class);
        $this->call(ColetaOvoSeed::class);
        $this->call(EmbalaOvoSeed::class);
        $this->call(EstoqueSeed::class);
        $this->call(FornecedorSeed::class);
        $this->call(FornecimentoSeed::class);
        $this->call(FuncaoSeed::class);
        $this->call(GaiolaSeed::class);
        $this->call(ManutencaoSeed::class);
        $this->call(MorteAveSeed::class);
        $this->call(ProdutoSeed::class);
        $this->call(UsuarioSeed::class);
        $this->call(VendaOvosSeed::class);
        $this->call(VentilacaoSeed::class);
    }
}
