<?php

use Illuminate\Database\Seeder;
use App\Fornecimento;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class FornecimentoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("fornecimento")->truncate();
        $faker = Faker::create("pt_BR");
        foreach (range(1, 30) as $fornecimento) {
            Fornecimento::create([
                "lote" => rand(3548, 9845),
                "quantidade" => rand(30, 320),
                "data_fornecimento" => $faker->date("Y-m-d", $max = "now"),
                "preco" => rand(10, 700),
                "data_fabricacao" => $faker->date("Y-m-d", $max = "now"),
                "data_validade" => $faker->date("Y-m-d"),
                "numero_nf" => rand(3548, 9845),
                "observacoes" => $faker->sentence,
                "id_produto" => rand(1, 30),
                "id_usuario" => rand(1, 30),
                "id_fornecedor" => rand(1, 30)
            ]);
        }
    }
}
