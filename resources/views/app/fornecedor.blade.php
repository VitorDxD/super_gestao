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

@unless ($fornecedores[0]['status'] == 'S')
    <p>Fornecedor 1 está inátivo.</p>
@endunless