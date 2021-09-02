<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';
        
        // echo $request->input('nome');
        // echo '<br>';

        // echo $request->input('email');


        // 1° JEITO DE ENVIAR DO FORM PARA BD
        // $contato = new SiteContato();

        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');
        // $contato->save();

        // 2° JEITO
        //$contato = new SiteContato();
        // $contato->fill($request->all());
        // $contato->save();

        // 3° JEITO
        //$contato = new SiteContato();
        //$contato->create($request->all());

        // 4° JEITO
        //SiteContato::create($request->all());

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {
        // Validação dos dados antes de salvar no BD
        $regras = [
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required|min:11',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:500'
        ];

        $feedback = [          
            'nome.min' => 'É necessário ao menos 3 caracteres neste campo.',
            'nome.max' => 'Este campo deve ter no máximo 40 caracteres.',

            'email' => 'O email informado é inválido.',

            'motivo_contatos_id.required' => 'Selecione o motivo deste contato.',

            'mensagem.max' => 'Este campo suporta no máximo 500 caracteres.',

            'required' => 'É necessário preencher este campo de :attribute.'
        ];
        
        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        
        return redirect()->route('site.index');
    }
}
