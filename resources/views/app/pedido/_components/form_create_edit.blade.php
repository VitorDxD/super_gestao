@if (isset($pedido))
    <form action="{{ route('pedido.update', ['pedido' => $pedido->id]) }}" method="post">
        @method('PUT')
@else                    
    <form action="{{ route('pedido.store') }}" method="post">
@endif
    @csrf

    <select name="cliente_id">
        <option>-- Selecione o Cliente --</option>

        @foreach ($clientes as $cliente)
            <option value="{{ $cliente->id }}" {{ ($pedido->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : '' }}>
                {{ $cliente->nome }}
            </option>
        @endforeach
        
    </select>
    {{ $errors->first('cliente_id') ?? '' }}

    <button type="submit" class="borda-preta">
        {{ isset($cliente) ? 'Atualizar' : 'Cadastrar' }}
    </button>
</form>