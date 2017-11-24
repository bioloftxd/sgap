<?php

use Illuminate\Database\Seeder;
use App\Produto;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProdutoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo_produto = ["Embalagem", "Medicamento", "Ração", "Vacina"];
        DB::table("produto")->truncate();
        $faker = Faker::create("pt_BR");
        foreach (range(1, 30) as $produto) {
            Produto::create([
                "nome" => $faker->lastName,
                "marca" => $faker->cityPrefix,
                "tipo_produto" => $tipo_produto[rand(0, 3)],
                "observacoes" => $faker->sentence
            ]);
        }
    }
}
