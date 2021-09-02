@if(isset($produto_detalhe->id))

    <form action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id ]) }}" method="post">
    @csrf
    @method('PUT')

@else
    <form action="{{ route('produto-detalhe.store') }}" method="post">
        @csrf 
                             
@endif
        <input type="text" name="produto_id" value="{{ $produto_detalhe->produto_id  ?? old('produto_id') }}" placeholder="Produto ID" class="borda-preta">
        {{ $errors->has('produto_id')  ? $errors->first('produto_id') : '' }}   

        <input type="text" name="comprimento" value="{{ $produto_detalhe->comprimento  ?? old('comprimento') }}" placeholder="Comprimento" class="borda-preta">
        {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}    

        <input type="text" name="largura" value="{{ $produto_detalhe->largura  ?? old('largura') }}" placeholder="Largura" class="borda-preta">
        {{ $errors->has('largura') ? $errors->first('largura') : '' }}  

        <input type="text" name="altura" value="{{ $produto_detalhe->altura  ?? old('altura') }}" placeholder="Altura" class="borda-preta">
        {{ $errors->has('altura') ? $errors->first('altura') : '' }}    

        <select name="unidade_id">
            @foreach($unidades as $unidade)
                <option value="{{ $unidade->id }}">{{ $unidade->descricao }}</option>
            @endforeach
        </select>

        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>