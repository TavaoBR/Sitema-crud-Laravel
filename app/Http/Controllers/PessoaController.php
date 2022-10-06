<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  App\Models\Pessoa;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

class PessoaController extends Controller
{
    public function registro()
    {
        return view('auth.registro');
    }

    public function registroValida(Request $request)
    {

    
            $this->validate($request, [
                'nome' => 'required',
                'sobrenome' => 'required',
                'senha' => 'required',
                'email' => 'required',
                'email_confirma' => 'required',
             ],[
                 'nome.required' => 'Por favor coloque nome de usuario',
                 'sobrenome.required' => 'Por favor coloque seu sobrenome',
                 'senha.required' => 'Por favor coloque senha uma senha',
                 'email.required' => 'Por favor coloque o email',
                 'email_confirma.required' => 'Por favor confirme o email',
             ]);

             //Variaveis criadas
             $pessoas = new Pessoa;

             $input_nome = $request->input('nome');
             $input_sobrenome = $request->input('sobrenome');
             $input_senha = $request->input('senha');
             $senha_hash = md5($input_senha);
             $input_email = $request->input('email');
             $input_confirma_email = $request->input('email_confirma');
             $id_url = Hash::make($input_nome.$input_email.$senha_hash);
             //$imagem = $request->file('imagem');

                   switch (true) {
                    case ($input_confirma_email != $input_email):
                        return redirect()->back()->with('erros', 'Emails não batem');  
                    break;
                    
                    default:
                       /*$data = array("nome" => $input_nome, "sobrenome" => $input_sobrenome, "email" => $input_email, "senha" => $senha_hash);
                       DB::table("pessoas")->insert($data);*/

                       $pessoas->nome = $input_nome;
                       $pessoas->sobrenome = $input_sobrenome;
                       $pessoas->email = $input_email;
                       $pessoas->senha = $senha_hash;
                       $pessoas->id_url = $id_url;

                       if($pessoas->save()){
                        return redirect()->back()->with('succeso', 'Cadastrado com sucesso');
                       }else{
                        return redirect()->back()->with('erros', 'Não foi possivel cadastrar');
                       }

                    break;
                   }
         
    }


    public function show()
    {
     
        if(session()->get('IDP') == null &&
         session()->get('IDURL') == null &&
         session()->get('EMAIL') == null &&
         session()->get('PASSWORD') == null )
         {
            return redirect()->route('form.login')->with('erros', 'Por favor Logue');
         }

        $pessoas = DB::select('SELECT * FROM pessoas');
        return view('exibicao.exibir_pessoas',['pessoas' => $pessoas]);
    }

    public function exibirPessoa($nome, $id_pessoa, $id_url)
    {
        if(session()->get('IDP') == null &&
         session()->get('IDURL') == null &&
         session()->get('EMAIL') == null &&
         session()->get('PASSWORD') == null )
         {
            return redirect()->route('form.login')->with('erros', 'Por favor Logue');
         }

         $pessoa = DB::select('SELECT * FROM pessoas WHERE nome = ? AND id_pessoa = ? AND id_url = ?'  , [$nome, $id_pessoa, $id_url]);
         return view('exibicao.perfil',['pessoa' => $pessoa]);
         
    }

 }
