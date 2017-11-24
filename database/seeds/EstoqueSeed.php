<?php

use Illuminate\Database\Seeder;
use App\Estoque;
use Illuminate\Support\Facades\DB;

class EstoqueSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("estoque")->truncate();
        foreach (range(1, 30) as $estoque) {
            Estoque::create([
                "quantidade" => rand(10, 650),
                "preco" => rand(100, 6500),
                "id_produto" => rand(1, 30)
            ]);
        }
    }
}
