@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="#">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Nome Fornecedor</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th>Comprimento</th>
                            <th>Largura</th>
                            <th>Altura</th>
                            <th>Visualizar</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($produtos as $produto)
                            <tr>
                                <td style="text-align: left; color: blue; font-weight: 600;">{{ $produto->nome }}</td>
                                <td style="text-align: left; color: green; font-weight: 600;">{{ $produto->descricao }}</td>
                                <td>{{ $produto->fornecedor->nome }}</td>
                                <td>{{ $produto->peso }} kg</td>
                                <td>{{ $produto->unidade_id }}</td>
                                <td>{{ $produto->itemDetalhe->comprimento ?? '0' }} cm</td>
                                <td>{{ $produto->itemDetalhe->largura ?? '0' }} cm</td>
                                <td>{{ $produto->itemDetalhe->altura ?? '0' }} cm</td>
                                {{-- <td><a href="{{ route('produto.show', ['produto' => $produto->id ]) }}">Visualizar</a></td> --}}
                                <td><a href="{{ route('produto.edit', ['produto' => $produto->id ]) }}">Editar</a></td>                        
                                <td>
                                    <form id="form_{{$produto->id}}" action="{{ route('produto.destroy', ['produto' => $produto->id ]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                        {{-- <button type="submit">Excluir</button> --}}
                                    </form>                     
                                </td>
                            </tr>
                            <tr>
                                <td colspan="12">
                                    <p>Pedidos</p>
                                    @foreach($produto->pedidos as $pedido)
                                        <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id ]) }}">
                                            Pedido: {{ $pedido->id }},
                                        </a>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <br>
                {{ $produtos->appends($request)->links() }}
            </div>
        </div>

    </div>
@endsection