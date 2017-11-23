<?php

use Illuminate\Database\Seeder;
use App\ColetaExcremento;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ColetaExcrementoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coleta_excremento')->truncate();
        $faker = Faker::create('pt_BR');
        foreach (range(1, 30) as $coletaExcremento) {
            ColetaExcremento::create([
                "data" => $faker->date($format = "Y-m-d", $max = "now"),
                "hora" => $faker->time($format = "H:i", $max = "now"),
                "litros" => rand(1, 40),
                "id_usuario" => rand(1, 30),
                "observacoes" => $faker->sentence()
            ]);
        }
    }
}
