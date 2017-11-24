<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class FornecedorSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("fornecedor")->truncate();
        $faker = Faker::create("pt_BR");
        foreach (range(1, 30) as $fornecedor) {
            Fornecedor::create([
                "nome" => $faker->name,
                "cpf_cnpj" => rand(100000000, 999999999),
                "telefone" => $faker->phoneNumber,
                "endereco" => $faker->streetAddress,
                "observacoes" => $faker->sentence
            ]);
        }
    }
}
