<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'codigo';
    protected $table = 'planos';
    protected $fillable = ['nome', 'registro'];
}
