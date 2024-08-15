@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Pedido - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin: 40px auto;">
                <table border="1" width=100% style="margin: 0 auto;">
                    <thead>
                        <tr>
                            <th>Pedido ID</th>
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <th>{{ $pedido->id }}</th>
                                <th>{{ $pedido->cliente_id }}</th>
                                <th><a href="{{ route('pedido-produto.create', ['pedido' => $pedido]) }}">Adicionar Produtos</a></th>
                                <th><a href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}">Visualizar</a></th>
                                <th><a href="{{ route('pedido.edit', ['pedido' => $pedido->id]) }}">Editar</a></th>
                                <th>
                                    <form id="form_{{$pedido->id}}" action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.querySelector('#form_{{$pedido->id}}').submit()">
                                            Excluir
                                        </a>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $pedidos->appends($request)->links('pagination::bootstrap-4') }}
                <br>
                <p>
                    Exibindo {{ $pedidos->count() }} pedidos de {{ $pedidos->total() }} ({{ $pedidos->firstItem() }} a {{ $pedidos->lastItem() }})
                </p>
            </div>
        </div>

    </div>
@endsection