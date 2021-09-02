{{ $slot }}
{{ $classe }}
<form action="{{ route('site.contato') }}" method="post">
    @csrf
    <input type="text" value="{{ old('nome') }}" name="nome" placeholder="Nome" class="{{ $classe }}">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
    <br>
    <input type="text" value="{{ old('telefone') }}" name="telefone" placeholder="Telefone" class="{{ $classe }}">
    {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
    <br>
    <input type="text" value="{{ old('email') }}" name="email" placeholder="E-mail" class="{{ $classe }}">
    {{ $errors->has('email') ? $errors->first('email') : '' }}
    <br>
    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>

        @foreach($motivo_contatos as $key => $motivo_contato)
            <option value="{{ $motivo_contato->id }}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>{{ $motivo_contato->motivo_contato }}</option>
        @endforeach      
    </select>
    {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }}
    <br>
    <textarea name="mensagem" class="{{ $classe }}">{{(old('mensagem') != '') ? old('mensagem') : 'Preencha aqui a sua mensagem' }}
    </textarea>
    {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

@if($errors->any())
    <div style="position: absolute; bottom: 0px; left: 0px; width: 100%; background: red;">
        @foreach($errors->all() as $erro)
            {{ $erro }}
            <br>
        @endforeach
    </div>
@endif