<?php

use Illuminate\Database\Seeder;
use App\ManutencaoAviario;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ManutencaoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("manutencao_aviario")->truncate();
        $faker = Faker::create("pt_BR");
        foreach (range(1, 30) as $manutencao) {
            ManutencaoAviario::create([
                "data_verifica" => $faker->date("Y-m-d", $max = "now"),
                "hora_verifica" => $faker->time("H:i", $max = "now"),
                "data_resolve" => $faker->date("Y-m-d", $max = "now"),
                "hora_resolve" => $faker->time("H:i", $max = "now"),
                "numero_relatorio" => rand(3000, 9999),
                "id_usuario_verifica" => rand(1, 30),
                "id_usuario_resolve" => rand(1, 30),
                "ocorrencia" => $faker->sentence,
                "resolucao" => $faker->sentence,
                "resolvido" => rand(0, 1),
            ]);
        }
    }
}
