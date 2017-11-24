<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\VendaOvo;
use Faker\Factory as Faker;

class VendaOvosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo_embalagem = ["12 Unidades", "30 Unidades"];
        DB::table("venda_ovos")->truncate();
        $faker = Faker::create("pt_BR");
        foreach (range(1, 30) as $vendaOvo) {
            VendaOvo::create([
                "data_venda" => $faker->date("Y-m-d", $max = "now"),
                "hora_venda" => $faker->time("H:i", $max = "now"),
                "quantidade" => rand(5, 20),
                "nome_comprador" => $faker->firstName,
                "lote" => rand(45648, 984651),
                "preco" => rand(10, 20),
                "tipo_embalagem" => $tipo_embalagem[rand(0, 1)],
                "id_usuario" => rand(1, 30),
                "observacoes" => $faker->sentence,
            ]);
        }
    }
}
