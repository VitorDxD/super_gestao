@php
    function onlyActives ($item) {
        return $item['status'] === 'S';
    }
@endphp

<h1>Número de fornecedores ativos: {{ count(array_filter($fornecedores, 'onlyActives')) }}</h1>

@forelse ($fornecedores as $indices => $fornecedor)
    @unless ($fornecedor['status'] == 'N')
        Fornecedor: {{ $fornecedor['name'] ?? 'Valor não definido' }} 
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'Valor não definido' }}
        <br>
        Telefone: {{ $fornecedor['ddd'] ?? '' }} {{ $fornecedor['telefone'] ?? 'Valor não definido' }}
        <br>
        Estado: 
        @switch ($fornecedor['ddd'])
            @case ('11')
                São Paulo
                @break
            @case ('82')
                Alagoas
                @break
            @case ('85')
                Ceará
                @break
            @default
                Não identificado
        @endswitch
        <hr>

        @if ($loop->last)
            Total cadastrado: {{ $loop->iteration }}
        @endif
    @endunless
@empty
    Não existem fornecedores cadastrados.
@endforelse