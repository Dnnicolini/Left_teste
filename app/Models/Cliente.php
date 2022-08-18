<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
   

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'data',
        'sobrenome',
        'telefone',
        'email',
        'documento',
    ];

    public function cliente_id() {
        return $this->hasMany('App\Models\EnderecoCliente', 'cliente_id');
    }
}
