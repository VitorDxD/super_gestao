@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Cliente - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin: 40px auto;">
                <table border="1" width=100% style="margin: 0 auto;">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <th>{{ $cliente->nome }}</th>
                                <th><a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}">Visualizar</a></th>
                                <th><a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">Editar</a></th>
                                <th>
                                    <form id="form_{{$cliente->id}}" action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.querySelector('#form_{{$cliente->id}}').submit()">
                                            Excluir
                                        </a>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $clientes->appends($request)->links('pagination::bootstrap-4') }}
                <br>
                <p>
                    Exibindo {{ $clientes->count() }} clientes de {{ $clientes->total() }} ({{ $clientes->firstItem() }} a {{ $clientes->lastItem() }})
                </p>
            </div>
        </div>

    </div>
@endsection