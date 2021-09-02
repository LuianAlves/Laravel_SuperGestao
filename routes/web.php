<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;
use App\Http\Middleware\AutenticacaoMiddleware;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;


Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');

Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'salvar'])->name('site.contato');

Route::get('/login{erro?}', [\App\Http\Controllers\LoginController::class, 'index'])->name('site.login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'autenticar'])->name('site.login');


// Agrupamento
Route::middleware('autenticacao:padrao, visitante')->prefix('/app')->group(function() { 
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [\App\Http\Controllers\LoginController::class, 'sair'])->name('app.sair');

    Route::get('/fornecedor', [\App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedor'); 
        Route::post('/fornecedor/listar', [\App\Http\Controllers\FornecedorController::class, 'listar'])->name('app.fornecedor.listar'); 
        Route::get('/fornecedor/listar', [\App\Http\Controllers\FornecedorController::class, 'listar'])->name('app.fornecedor.listar'); 
        Route::get('/fornecedor/adicionar', [\App\Http\Controllers\FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar'); 
        Route::post('/fornecedor/adicionar', [\App\Http\Controllers\FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar'); 
        Route::get('/fornecedor/editar/{id}/{msg?}', [\App\Http\Controllers\FornecedorController::class, 'editar'])->name('app.fornecedor.editar'); 
        Route::get('/fornecedor/excluir/{id}', [\App\Http\Controllers\FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir'); 

    // Rota utilizando o resources para produtos
    Route::resource('produto', ProdutoController::class);   
    // Rota utilizando o resources para produtos detalhes
    Route::resource('produto-detalhe', ProdutoDetalheController::class); 
     
    // Rota utilizando o resources para cliente
    Route::resource('cliente', ClienteController::class);  
    // Rota utilizando o resources para pedido
    Route::resource('pedido', PedidoController::class);  
    // Rota utilizando o resources para pedido-produto
        //Route::resource('pedido-produto', PedidoProdutoController::class); -- NECESSÁRIO ROTAS CUSTOMS
        Route::get('/pedido-produto/create/{pedido}', [\App\Http\Controllers\PedidoProdutoController::class, 'create'])->name('pedido-produto.create');
        Route::post('/pedido-produto/store/{pedido}', [\App\Http\Controllers\PedidoProdutoController::class, 'store'])->name('pedido-produto.store');
        Route::delete('/pedido-produto/destroy/{pedidoProduto}/{pedido_id}', [\App\Http\Controllers\PedidoProdutoController::class, 'destroy'])->name('pedido-produto.destroy');
});


// Fallback - Quando houver erro
Route::fallback(function(){
    echo 'A rota não existe. <a href="' .route('site.index'). '" >clique aqui!</a>';
});
