<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plano;
use App\Models\PlanoPreco;
use App\Models\Preco;
use PhpParser\Node\Stmt\TryCatch;

class BeneficiarioController extends Controller
{
    public function calculo(Request $request)
    {
        $data = $request->all();

        // Variáveis
        $codigo_plano = $data['codigo_plano'];
        $qtd_beneficiarios = $data['qtd_beneficiarios'];
        $beneficiarios = $data['beneficiarios'];

        // Se for um plano individual, se a quantidade de beneficiário informada for igual a 1
        if($qtd_beneficiarios == 1){
            // Definindo beneficiário
            $beneficiario = $beneficiarios[0];
            $idade = $beneficiario['idade'];

            // Plano
            $pivot = PlanoPreco::where('plano_id', "=",  $codigo_plano)->get();
            $preco_id = $pivot[0]["preco_id"];
            $plano = Preco::find($preco_id);

            $faixa1 = ($idade >= 0 && $idade <= 17);
            $faixa2 = ($idade >= 18 && $idade <= 40);
            $faixa3 = ($idade > 40);

            switch($idade){
                case $faixa1:
                    $beneficiario['faixa'] = 1;
                    $beneficiario['mensalidade_individual'] = $plano['faixa1'];
                    return response()->json(["total" => $beneficiario['mensalidade_individual'], "dados" => $beneficiario], 200);
                    break;

                case $faixa2:
                    $beneficiario['faixa'] = 2;
                    $beneficiario['mensalidade_individual'] = $plano['faixa2'];
                    return response()->json(["total" => $beneficiario['mensalidade_individual'], "dados" => $beneficiario], 200);
                    break;
                
                case $faixa3:
                    $beneficiario['faixa'] = 3;
                    $beneficiario['mensalidade_individual'] = $plano['faixa3'];
                    return response()->json(["total" => $beneficiario['mensalidade_individual'], "dados" => $beneficiario], 200);
                    break;
            }
        }else if($qtd_beneficiarios > 1){
            // Plano
            $pivot = PlanoPreco::where('plano_id', "=",  $codigo_plano)->get();
            $preco_id = $pivot[1]["preco_id"];
            $plano = Preco::find($preco_id);

            // Salvando a faixa e preços baseado na idade
            for ($i = 0; $i < $qtd_beneficiarios; $i++) {
                if ($beneficiarios[$i]['idade'] >= 0 && $beneficiarios[$i]['idade'] <= 17) {
                    $beneficiarios[$i]['faixa'] = 1;
                    $beneficiarios[$i]['mensalidade_individual'] = $plano['faixa1'];

                } else if ($beneficiarios[$i]['idade'] >= 18 && $beneficiarios[$i]['idade'] <= 40) {
                    $beneficiarios[$i]['faixa'] = 2;
                    $beneficiarios[$i]['mensalidade_individual'] = $plano['faixa2'];

                } else if ($beneficiarios[$i]['idade'] > 40) {
                    $beneficiarios[$i]['faixa'] = 3;
                    $beneficiarios[$i]['mensalidade_individual'] = $plano['faixa3'];

                } else {
                    return response()->json(["error" => "Houve um problema interno ao calcular a idade dos beneficiários!"], 400);
                }
            }

            switch($qtd_beneficiarios){
                case 2:
                    $total = $beneficiarios[0]['mensalidade_individual'] + $beneficiarios[1]['mensalidade_individual'];
                    return response()->json(["total" => $total, "dados" => $beneficiarios], 200);

                case 4:
                    $total = $beneficiarios[0]['mensalidade_individual'] + $beneficiarios[1]['mensalidade_individual'] + $beneficiarios[2]['mensalidade_individual'] + $beneficiarios[3]['mensalidade_individual'];
                    return response()->json(["total" => $total, "dados" => $beneficiarios], 200);
            }

            return $beneficiarios;
        }else{ 
            return response()->json(["error" => "Há um erro na quantidade de beneficiários informada."], 400); 
        }
        
    }
}
