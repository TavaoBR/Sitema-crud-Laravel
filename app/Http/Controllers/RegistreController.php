<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\login;

class RegistreController extends Controller
{

    public function formregistre()
    {
        return view('auth.registre');
    }

    public function registre(Request $request)
    {
        $this->validate($request, [
           'nome' => 'required',
           'senha' => 'required'
        ],[
            'nome.required' => 'Por favor coloque nome de usuario',
            'senha.required' => 'Por favor coloque senha uma senha',
        ]);

        $login = new Login;
        $login->nome=$request->nome;
        $login->senha=$request->senha;
        $login->save();
        
        return redirect()->back()->with('succeso', 'Cadastrado com sucesso');
    }
}
