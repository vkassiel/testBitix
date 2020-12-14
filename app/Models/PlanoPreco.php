<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanoPreco extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'plano_precos';

}
