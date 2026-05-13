<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'sexo'
    ];

    public function processos() {
        return $this->hasMany(Processo::class);
    }
}
