<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidade;
use App\Models\ItemDetalhe;

class ProdutoDetalheController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto_detalhe.create', ['unidades' => $unidades]);
    }

    public function store(Request $request)
    {
        ItemDetalhe::create($request->all());
        echo 'Cadastro realizado com sucesso';
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $produtoDetalhe = ItemDetalhe::find($id);
        $unidades = Unidade::all();
        return view('app.produto_detalhe.edit', ['produto_detalhe' => $produtoDetalhe, 'unidades' => $unidades]);
    }

    public function update(Request $request, $id)
    {
        $produtoDetalhe = ItemDetalhe::find($id);
        $produtoDetalhe->update($request->all());
        echo 'Atualização foi realizada com sucesso';
    }

    public function destroy(string $id)
    {
        //
    }
}
