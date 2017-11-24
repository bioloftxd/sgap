<?php

use Illuminate\Database\Seeder;
use App\Ventilacao;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class VentilacaoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("ventilacao")->truncate();
        $faker = Faker::create("pt_BR");
        foreach (range(1, 30) as $ventilacao) {
            Ventilacao::create([
                "data_abertura" => $faker->date("Y-m-d", $max = "now"),
                "hora_abertura" => $faker->time("H:i", $max = "now"),
                "data_fechamento" => $faker->date("Y-m-d", $max = "now"),
                "hora_fechamento" => $faker->time("H:i", $max = "now"),
                "temperatura_maxima" => rand(25, 35),
                "temperatura_minima" => rand(20, 25),
                "id_usuario" => rand(1, 30),
                "observacoes" => $faker->sentence
            ]);
        }
    }
}
