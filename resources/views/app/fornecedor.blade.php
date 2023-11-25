<h1>Número de fornecedores: {{ count($fornecedores) }}</h1>

@php
    // Esse é um comentário seguindo o padrão PHP.
@endphp

@if (count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem apenas alguns fornecedores aqui.</h3>
@elseif (count($fornecedores) > 10)
    <h3>Existem muitos fornecedores aqui.</h3>
@else
    <h3>Ainda não existem fornecedores aqui.</h3>
@endif

@for ($i = 0; isset($fornecedores[$i]); $i++)
    @unless ($fornecedores[$i]['status'] == 'N')
        Fornecedor: {{ $fornecedores[$i]['name'] ?? 'Valor não definido' }} 
        <br>
        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'Valor não definido' }}
        <br>
        Telefone: {{ $fornecedores[$i]['ddd'] ?? '' }} {{ $fornecedores[$i]['telefone'] ?? 'Valor não definido' }}
        <br>
        Estado: 
        @switch ($fornecedores[$i]['ddd'])
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
    @endunless
@endfor