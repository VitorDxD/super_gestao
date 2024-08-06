@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Produto - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 100%; margin: 40px auto;">
                <table border="1" style="margin: 0 auto;">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <th>{{ $produto->nome }}</th>
                                <th>{{ $produto->descricao }}</th>
                                <th>{{ $produto->peso }}</th>
                                <th>{{ $produto->unidade_id }}</th>
                                <th><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></th>
                                <th><a href="{{ route('produto.edit', ['produto' => $produto->id]) }}">Editar</a></th>
                                <th><a href="">Excluir</a></th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $produtos->appends($request)->links('pagination::bootstrap-4') }}
                <br>
                <p>
                    Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }} ({{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})
                </p>
            </div>
        </div>

    </div>
@endsection