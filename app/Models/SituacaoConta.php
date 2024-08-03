<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SituacaoConta extends Model
{
    use HasFactory;

    //indicar nome da tabela
    protected $table = 'situacoes_contas';

    //indicar quantas colunas podem ser cadastradas
    protected $fillable = ['nome', 'cor'];

    public function conta() {
        return $this->hasMany(Conta::class);
    }
}
