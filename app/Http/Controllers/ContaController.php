<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContaRequest;
use App\Models\Conta;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    // listar as contas
    public function menu(){
        //Carregar view
        return view('site.welcome');
    }

    public function index(){

        //recuperar os registros do banco de dados
        $contas = Conta::orderByDesc('created_at')->get();
        
        //Carregar view
        return view('contas.index', ['contas'=>$contas]);
    }

    // detalhes da conta
    public function show(Conta $conta){

        //Carregar view
        return view('contas.show', ['conta'=>$conta]);
    }

    
    // carregar o formulario cadastrar nova conta
    public function create(){
        //Carregar view
        return view('contas.create');
    }

    
    // cadastrar no banco de dados nova conta
    public function store(ContaRequest $request){

        //validar formulario
        $request->validated();

        //cadastrar na banco de dados na tabela contas os valores de todos os campos
        $conta = Conta::create($request->all());

        //Redirecionar o usuario, enviar uma mensagem de sucesso
        return redirect()->route('conta.show',['conta' => $conta->id])->with('success', 'Conta cadastrada com sucesso');
    }

    
    // carregar o formulario editar a conta
    public function edit(){
        //Carregar view
        return view('contas.edit');
    }

    
    // editar no banco de dados a conta
        public function update(){
        dd('editar');
    }

    
    // excluir a conta no banco de dados
    public function delete(){
        dd('Apagar');
    }

    
}
