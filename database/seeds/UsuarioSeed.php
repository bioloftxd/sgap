<?php

use Illuminate\Database\Seeder;
use App\Usuario;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsuarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario')->truncate();
        $faker = Faker::create('pt_BR');
        Usuario::create([
            "nome" => "Admin",
            "usuario" => "root",
            "senha" => md5("root"),
            "id_funcao" => 1
        ]);
        foreach (range(2, 30) as $usuario) {
            Usuario::create([
                "nome" => $faker->name,
                "usuario" => $faker->userName,
                "senha" => md5("root"),
                "id_funcao" => rand(1, 2)
            ]);
        }
    }
}
