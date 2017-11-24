<?php

use Illuminate\Database\Seeder;
use App\MorteAve;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MorteAveSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("morte_aves")->truncate();
        $faker = Faker::create("pt_BR");
        foreach (range(1, 30) as $cont => $morte) {
            MorteAve::create([
                "data" => $faker->date("Y-m-d", $max = "now"),
                "hora" => $faker->time("H:i", $max = "now"),
                "id_gaiola" => $cont+1,
                "quantidade_aves" => rand(4, 8),
                "id_usuario" => rand(1, 30),
                "observacoes" => $faker->sentence,
            ]);
        }
    }
}
