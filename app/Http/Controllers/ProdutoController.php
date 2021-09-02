<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Item;
use App\Models\Unidade;
use App\Models\ProdutoDetalhe;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $produtos = Item::with(['itemDetalhe', 'fornecedor'])->paginate(10);
        
        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();

        return view('app.produto.create', ['unidades' => $unidades,  'fornecedores' => $fornecedores]);
    }

    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:5|max:500',
            'peso' => 'required|integer'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido!',

            'nome.min' => 'O campo :attribute deve ter no mínimo 3 caracteres.',
            'nome.max' => 'O campo :attribute deve ter no máximo 40 caracteres.',

            'descricao.min' => 'O campo :attribute deve ter no mínimo 5 caracteres.',
            'descricao.max' => 'O campo :attribute deve ter no máximo 500 caracteres.',

            'peso.integer' => 'O campo :attribute precisa ser um número inteiro.'

        ];

        $request->validate($regras, $feedback);

        Item::create($request->all());

        return redirect()->route('produto.index');
    }

    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();

        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades,  'fornecedores' => $fornecedores]);
        //return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
    }

    public function update(Request $request, Item $produto)
    {   
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:5|max:500',
            'peso' => 'required|integer'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido!',

            'nome.min' => 'O campo :attribute deve ter no mínimo 3 caracteres.',
            'nome.max' => 'O campo :attribute deve ter no máximo 40 caracteres.',

            'descricao.min' => 'O campo :attribute deve ter no mínimo 5 caracteres.',
            'descricao.max' => 'O campo :attribute deve ter no máximo 500 caracteres.',

            'peso.integer' => 'O campo :attribute precisa ser um número inteiro.'

        ];

        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id ]);
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produto.index');
    }
}
