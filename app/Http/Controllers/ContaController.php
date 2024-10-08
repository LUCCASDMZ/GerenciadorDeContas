<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContaRequest;
use App\Models\Conta;
use App\Models\SituacaoConta;
use Barryvdh\DomPDF\Facade\PDF;
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

    public function index(Request $request){

        //recuperar os registros do banco de dados
        $contas = Conta::when($request->has('nome'),function($whenQuery) use ($request){
            $whenQuery->where('nome', 'like', '%'. $request->nome .'%');
        })
        ->when($request->filled('dataInicio'), function($whenQuery) use ($request){
            $whenQuery->where('vencimento', '>=', \Carbon\Carbon::parse($request->dataInicio)->format('Y-m-d'));
        })
        ->when($request->filled('dataFim'), function($whenQuery) use ($request){
            $whenQuery->where('vencimento', '<=', \Carbon\Carbon::parse($request->dataFim)->format('Y-m-d'));
        })
        ->with('situacaoConta')
        ->orderByDesc('created_at')
        ->paginate(2)
        ->withQueryString();


        //Carregar view
        return view('contas.index', [
            'contas'=>$contas,
            'nome' => $request->nome,
            'dataInicio' => $request->dataInicio,
            'dataFim' => $request->dataFim,
        ]);
    }

    // detalhes da conta
    public function show(Conta $conta){

        //Carregar view
        return view('contas.show', ['conta'=>$conta]);
    }


    // carregar o formulario cadastrar nova conta
    public function create(){


        //Recuperar do banco de dados as situações
        $situacoesContas = SituacaoConta::orderBy('nome', 'asc')->get();

        //Carregar view
        return view('contas.create', [
            'situacoesContas' => $situacoesContas
        ]);
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
            'situacao_conta_id' => $request->situacao_conta_id,
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

        $situacoesContas = SituacaoConta::orderBy('nome', 'asc')->get();

        //Carregar view
        return view('contas.edit',[
            'conta'=> $conta,
            'situacoesContas' => $situacoesContas,
        ]);
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
            'situacao_conta_id' => $request->situacao_conta_id,

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

    //gerar PDF
    public function gerarPdf(Request $request) {

        //recuperar os registros do banco de dados
        //$contas = Conta::orderByDesc('created_at')->get();
        $contas = Conta::when($request->has('nome'),function($whenQuery) use ($request){
            $whenQuery->where('nome', 'like', '%'. $request->nome .'%');
        })
        ->when($request->filled('dataInicio'), function($whenQuery) use ($request){
            $whenQuery->where('vencimento', '>=', \Carbon\Carbon::parse($request->dataInicio)->format('Y-m-d'));
        })
        ->when($request->filled('dataFim'), function($whenQuery) use ($request){
            $whenQuery->where('vencimento', '<=', \Carbon\Carbon::parse($request->dataFim)->format('Y-m-d'));
        })
        ->orderByDesc('created_at')
        ->get();

        $totalValor = $contas->sum('valor');

        $pdf = PDF::loadView('contas.gerarPDF', [
            'contas' => $contas,
            'totalValor' => $totalValor,
            ])->setPaper('a4', 'portrait');

        return $pdf->download('listar_contas.pdf');
    }

    public function changeSituation(Conta $conta)
    {
        try{
            //editar as informaçoes no banco de dados
            $conta->update([
                'situacao_conta_id' => $conta->situacao_conta_id == 1 ? 2 : 1,

            ]);
            //salvar log
        Log::info('Situação da conta editada com sucesso', ['id' => $conta->id]);

        //Redirecionar o usuario, enviar uma mensagem de sucesso
        return back()->with('success', 'Situação da conta editada com sucesso');

        }   catch(Exception $e){
        //salvar log
        Log::warning('Situação da conta nao editada', ['error' => $e->getMessage()]);

        // redirecionar o usuario, enviar a mensagem de erro
        return back()->with('error', 'Situação da conta nao editada!');
        }
    }

}
