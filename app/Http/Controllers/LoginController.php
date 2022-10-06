<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function LoginForm()
    {
        return view("auth.login");
    }

    public function validaLogin(Request $request)
    {

    
        $this->validate($request, [
        'email' => 'required',
        'senha' => 'required',
        ], [
          'email.required' => 'Por favor coloque email',
          'senha.required' => 'Por favor coloque senha'
        ]);
        

        $input_email = $request->input('email');
        $input_senha = $request->input('senha');
        $hash_senha_make = md5($input_senha);

        $select_pessoa = Pessoa::where('email', '=', $input_email)->where('senha','=',$hash_senha_make)->first();
        
        if(@$select_pessoa->id_pessoa != null )
        {   

          Pessoa::where('id_pessoa','=', $select_pessoa->id_pessoa)->update(['id_url' => md5($select_pessoa->id_url.$select_pessoa->senha.$select_pessoa->email.$select_pessoa->id_pessoa)]);
        
          $request->session()->put('IDP', $select_pessoa->id_pessoa);
          $request->session()->put('IDURL', $select_pessoa->id_url);
          $request->session()->put('NOME', $select_pessoa->nome);
          $request->session()->put('EMAIL', $select_pessoa->email);
          $request->session()->put('PASSWORD', $select_pessoa->senha);

            return redirect()->route('exibir.perfil', ['nome' => $select_pessoa->nome, 'id_pessoa' => $select_pessoa->id_pessoa, 'id_url' => md5($select_pessoa->id_url.$select_pessoa->senha.$select_pessoa->email.$select_pessoa->id_pessoa)]);
          
        }else{
           return redirect()->back()->with('erros', 'Email ou Senha Invalidos Ou usuario não existe');
        }
    }
    
}
