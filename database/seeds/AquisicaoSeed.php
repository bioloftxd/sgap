<?php

use Illuminate\Database\Seeder;
use App\AquisicaoAve;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class AquisicaoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $raca = ["Embrapa 051", "Gigante Negra De Jersey", "Rhode Island Red", "Plymouth Rock Barrada", "Caipira De Pescoço Pelado", "Orpington", "Caipira Comum", "Shamo", "Embrapa 041", "Garnizés", "Índio Gigante"];
        $vacinas = ["Anemia Infecciosa", "Bronquite Infecciosa", "Coccidiose", "Coriza", "Doença de Gumboro", "Doença de Marek", "Doença de Newcastle", "Encefalomielite", "Epitelioma (Bouba)", "Pneumovírus", "Reovírus", "Salmonela enteritidis", "Salmonela gallinarum"];

        DB::table('aquisicao_aves')->truncate();
        $faker = Faker::create('pt_BR');
        foreach (range(1, 30) as $aquisicao) {
            AquisicaoAve::create([
                "data_chegada" => $faker->date($format = 'Y-m-d', $max = 'now'),
                "hora_chegada" => $faker->time($format = 'H:i', $max = 'now'),
                "data_saida" => $faker->date($format = 'Y-m-d', $max = 'now'),
                "hora_saida" => $faker->time($format = 'H:i', $max = 'now'),
                "numero_gta" => rand(195648954, 964562245),
                "numero_nf" => rand(195648954, 964562245),
                "quantidade_total" => rand(50, 6000),
                "quantidade_morta" => rand(1, 20),
                "raca" => $raca[rand(0, 10)],
                "vacinas" => $vacinas[rand(0, 12)],
                "idade" => rand(15, 735),
                "preco" => rand(5000, 60000),
                "id_usuario" => rand(1, 30),
                "observacoes" => $faker->sentence()
            ]);
        }
    }
}
