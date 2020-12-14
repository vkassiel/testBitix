<?php

namespace Database\Seeders;

use App\Models\Preco;
use Illuminate\Database\Seeder;

class PrecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Preco::truncate();

        Preco::create([
            "minimo_vidas" => 1,
            "faixa1" => 10.00,
            "faixa2" => 12,
            "faixa3" => 15.00
        ])->planos()->sync(1);

        Preco::create([
            "minimo_vidas" => 4,
            "faixa1" => 9,
            "faixa2" => 11.00,
            "faixa3" => 14.00
        ])->planos()->sync(1);

        Preco::create([
            "minimo_vidas" => 1,
            "faixa1" => 20.00,
            "faixa2" => 30,
            "faixa3" => 40.00
        ])->planos()->sync(2);

        Preco::create([
            "minimo_vidas" => 1,
            "faixa1" => 30,
            "faixa2" => 40.00,
            "faixa3" => 50
        ])->planos()->sync(3);

        Preco::create([
            "minimo_vidas" => 1,
            "faixa1" => 40.00,
            "faixa2" => 50.00,
            "faixa3" => 60
        ])->planos()->sync(4);

        Preco::create([
            "minimo_vidas" => 1,
            "faixa1" => 50,
            "faixa2" => 60.00,
            "faixa3" => 70.00
        ])->planos()->sync(5);

        Preco::create([
            "minimo_vidas" => 1,
            "faixa1" => 60,
            "faixa2" => 70,
            "faixa3" => 80
        ])->planos()->sync(6);

        Preco::create([
            "minimo_vidas" => 2,
            "faixa1" => 55.00,
            "faixa2" => 65.00,
            "faixa3" => 75.00
        ])->planos()->sync(6);
 
    }
}
