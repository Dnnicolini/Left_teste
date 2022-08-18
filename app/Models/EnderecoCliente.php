<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnderecoCliente extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cep',
        'rua',
        'bairro',
        'numero',
        'cidade',
        'estado',
    ];
    public function cliente_id() {
        return $this->belongsTo('App\Models\Cliente', 'cliente_id');
    }
}
