<?php

use Illuminate\Database\Seeder;
use App\EmbalaOvo;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class EmbalaOvoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo_embalagem = ["12 Unidades", "30 Unidades"];
        DB::table("embala_ovos")->truncate();
        $faker = Faker::create("pt_BR");
        foreach (range(1, 30) as $embalaOvos) {
            EmbalaOvo::create([
                "data" => $faker->date("Y-m-d"),
                "hora" => $faker->time("H:i"),
                "lote" => rand(45648, 984651),
                "quantidade_embalada" => rand(5, 120),
                "tipo_embalagem" => $tipo_embalagem[rand(0, 1)],
                "id_usuario" => rand(1, 30),
                "observacoes" => $faker->sentence(),
            ]);
        }
    }
}
