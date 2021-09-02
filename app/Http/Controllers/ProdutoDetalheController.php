<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidade;
use App\Models\ItemDetalhe;
use App\Models\ProdutoDetalhe;

class ProdutoDetalheController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $unidades = Unidade::all();

        return view('app.produto_detalhe.create', ['unidades' => $unidades ]);
    }

    public function store(Request $request)
    {
        ProdutoDetalhe::create($request->all());
        echo 'cadastro com sucesso';
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $produtoDetalhe = ItemDetalhe::with(['item'])->find($id);
        $unidades = Unidade::all();
        
        return view('app.produto_detalhe.edit', ['produto_detalhe' => $produtoDetalhe, 'unidades' => $unidades ]);
    }

    public function update(Request $request, ProdutoDetalhe $produtoDetalhe)
    {
        $produtoDetalhe->update($request->all());
        echo 'Atualização realizada com sucesso!';
    }

    public function destroy($id)
    {
        //
    }
}
