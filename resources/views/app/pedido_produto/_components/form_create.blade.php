<form action="{{ route('pedido-produto.store', ['pedido' => $pedido]) }}" method="post">
    @csrf

    <select name="produto_id">
        <option>-- Selecione o Produto --</option>

        @foreach ($produtos as $produto)
            <option value="{{ $produto->id }}" {{ old('produto_id') == $produto->id ? 'selected' : '' }}>
                {{ $produto->nome }}
            </option>
        @endforeach
        
    </select>
    {{ $errors->first('produto_id') ?? '' }}

    <input type="number" min="1" name="quantidade" value="{{ old('quantidade') ?? '' }}" placeholder="Quantidade" class="borda-preta">
    {{ $errors->first('quantidade') ?? '' }}


    <button type="submit" class="borda-preta">
        {{ isset($produto_detalhe) ? 'Atualizar' : 'Cadastrar' }}
    </button>
</form>