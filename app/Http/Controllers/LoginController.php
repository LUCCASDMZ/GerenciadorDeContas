<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request){
        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ],[
            'email.required' => 'O campo email e obrigatorio',
            'email' => 'O email não é valido',
            'password' => 'O campo senha é obrigatorio',
        ]);

        if(Auth::attempt($credenciais,)) {
            $request->session()->regenerate();
            return redirect()->intended(route('conta.index'));
        } else {
            return redirect()->back()->with('error', 'Usuario ou senha invalido');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('conta.index'));
    }

    public function create()
    {
        return view('login.create');
    }

}
