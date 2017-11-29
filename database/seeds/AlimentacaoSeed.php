<?php

use Illuminate\Database\Seeder;
use App\AlimentacaoAve;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class AlimentacaoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo_racao = ['Inicial', 'Engorda', 'Experimental', 'Postura', 'Recria'];

        DB::table('alimentacao_aves')->truncate();
        $faker = Faker::create('pt_BR');
        foreach (range(1, 30) as $alimentacao) {
            AlimentacaoAve::create([
                "data" => $faker->date($format = 'Y-m-d', $max = 'now'),
                "hora" => $faker->time($format = 'H:i', $max = 'now'),
                "quantidade_alimento" => rand(1, 40),
                "tipo_racao" => $tipo_racao[rand(0, 4)],
                "id_racao" => rand(1, 30),
                "id_usuario" => rand(1, 30),
                "observacoes" => $faker->sentence
            ]);
        }
    }
}
