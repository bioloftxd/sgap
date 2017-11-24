<?php

use Illuminate\Database\Seeder;
use App\Gaiola;
use Illuminate\Support\Facades\DB;

class GaiolaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("gaiola")->truncate();
        foreach (range(1, 30) as $cont => $gaiola) {
            Gaiola::create([
                "numero_gaiola" => $cont,
                "quantidade_aves" => rand(10, 20)
            ]);
        }
    }
}
