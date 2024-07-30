<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContaRequest;
use App\Models\Conta;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        try{

        //cadastrar na banco de dados na tabela contas os valores de todos os campos
        $conta = Conta::create([
            'nome' => $request->nome,
            'valor' => str_replace(',', '.', str_replace('.', '', $request->valor)),
            'vencimento' => $request->vencimento,
        ]);

        //Redirecionar o usuario, enviar uma mensagem de sucesso
        return redirect()->route('conta.show',['conta' => $conta->id])->with('success', 'Conta cadastrada com sucesso');
        }
        catch(Exception $e){

            //salvar log
            Log::warning('Conta nao editada', ['error' => $e->getMessage()]);

            // redirecionar o usuario, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Conta nao cadastrada!');
        }
    }


    // carregar o formulario editar a conta
    public function edit(Conta $conta){

        //Carregar view
        return view('contas.edit',['conta'=> $conta]);
    }


    // editar no banco de dados a conta
        public function update(ContaRequest $request, Conta $conta){

        //validar o formulario
        $request->validated();

        try{

        //editar as informações do banco de dados
        $conta->update([
            'nome'=> $request->nome,
            'valor'=> str_replace(',', '.', str_replace('.', '', $request->valor)),
            'vencimento'=> $request->vencimento,

        ]);

        //salvar log
        Log::info('Conta editada com sucesso', ['id' => $conta->id]);

        //Redirecionar o usuario, enviar uma mensagem de sucesso
        return redirect()->route('conta.show', ['conta' => $conta->id])->with('success', 'Conta editada com sucesso');
        }
        catch(Exception $e){

            //salvar log
            Log::warning('Conta nao editada', ['error' => $e->getMessage()]);

            // redirecionar o usuario, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Conta nao editada!');
        }
    }


    // excluir a conta no banco de dados
    public function destroy(Conta $conta){
        $conta->delete();

        return redirect()->route('conta.index')->with('success', 'Conta excluida com sucesso');
    }


}
