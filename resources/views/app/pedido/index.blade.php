@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Pedidos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
                <li><a href="#">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Cliente</th>
                            <th>Adicionar Produtos</th>
                            <th>Visualizar</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->cliente_id }}</td>
                                <td><a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id ]) }}">Adicionar</a></td>
                                <td><a href="#">Visualizar</a></td>
                                <td><a href="#">Editar</a></td>                        
                                <td>
                                    <form id="form_{{$pedido->id}}" action="{{ route('pedido.destroy', ['pedido' => $pedido->id ]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
                                        {{-- <button type="submit">Excluir</button> --}}
                                    </form>                     
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <br>
                {{ $pedidos->appends($request)->links() }}
            </div>
        </div>

    </div>
@endsection