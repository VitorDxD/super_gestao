@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Adicionar Produtos ao Pedido</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <h4>Detalhes do pedido</h4>
            <p>Id do produto: {{ $pedido->id }}</p>
            <p>Cliente: {{ $pedido->cliente_id }}</p>

            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <h4>Itens do Pedido</h4>
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Data de Inclusão</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos as $produto)
                            <tr>
                                <th>{{ $produto->id }}</th>
                                <th>{{ $produto->nome }}</th>
                                <th>{{ $produto->pivot->created_at->format('d/m/y') }}</th>
                                <th>
                                    <form id="form_{{$produto->pivot->id}}" action="{{ route('pedido-produto.destroy', ['pedidoProduto' => $produto->pivot->id, 'pedido' => $pedido]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.querySelector('#form_{{$produto->pivot->id}}').submit()">
                                            Excluir
                                        </a>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
                @endcomponent
            </div>
        </div>

    </div>
@endsection