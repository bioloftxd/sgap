<?php

use Illuminate\Database\Seeder;
use App\ColetaOvo;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ColetaOvoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("coleta_ovos")->truncate();
        $faker = Faker::create('pt_BR');
        foreach (range(1, 30) as $coletaOvos) {
            ColetaOvo::create([
                "data" => $faker->date("Y-m-d", $max = "now"),
                "hora" => $faker->time("H:i", $max = "now"),
                "quantidade_coletado" => rand(300, 900),
                "quantidade_quebrado" => rand(10, 60),
                "id_usuario" => rand(1, 30),
                "observacoes" => $faker->sentence(),
            ]);
        }
    }
}
