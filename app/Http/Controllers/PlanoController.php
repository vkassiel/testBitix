<?php

namespace App\Http\Controllers;

use App\Models\Plano;
use App\Models\PlanoPreco;
use App\Models\Preco;
use Illuminate\Http\Request;

class PlanoController extends Controller
{
    public function all(){
        return Plano::all();
    }

    public function precos(){
        return Preco::all();
    }
}
