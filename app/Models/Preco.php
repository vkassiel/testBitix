<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preco extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'precos';
    protected $fillable = ['minimo_vidas', 'faixa1', 'faixa2', 'faixa3'];
    protected $hidden = ['id'];
    protected $appends = ['codigo'];

    public function planos()
    {
        return $this->belongsToMany(
            Plano::class,
            'plano_precos',
            'preco_id',
            'plano_id',
            'id',
            'codigo'
        );
    }

    public function getCodigoAttribute()
    {
        if($this->planos()->first()){
            return $this->planos()->first()->codigo;
        }

        return 0;
    }
}
