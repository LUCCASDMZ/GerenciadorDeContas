<?php

namespace Database\Seeders;

use App\Models\Conta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!Conta::where('nome', 'Energia')->first()){
            Conta::create([
              'nome' => 'Energia',
              'valor' => '147.52',
              'vencimento' => '2023-12-23',
            ]);
        }
        if(!Conta::where('nome', 'Internet')->first()){
            Conta::create([
              'nome' => 'Energia',
              'valor' => '97.99',
              'vencimento' => '2023-12-23',
            ]);
        }
    }
}
