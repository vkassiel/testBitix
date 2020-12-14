<?php

namespace Database\Seeders;

use App\Models\Plano;

use Illuminate\Database\Seeder;

class PlanoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plano::truncate();

        for($i = 1; $i <= 6; $i++){
            Plano::factory(1)->create([
                'registro' => "reg$i",
                'nome' => "Bitix Customer Plano $i",
            ]);
        }
    }
}
