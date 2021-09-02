@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Clientes</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="#">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Visualizar</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->nome }}</td>

                                <td><a href="#">Visualizar</a></td>
                                <td><a href="#">Editar</a></td>                        
                                <td>
                                    <form id="form_{{$cliente->id}}" action="{{ route('cliente.destroy', ['cliente' => $cliente->id ]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                                    </form>                     
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <br>
                {{ $clientes->appends($request)->links() }}
            </div>
        </div>

    </div>
@endsection