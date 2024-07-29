<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    //indicar nome da tabela
    protected $table = 'contas';

    //indicar quantas colunas podem ser cadastradas
    protected $fillable = ['nome', 'valor', 'vencimento'];
}
