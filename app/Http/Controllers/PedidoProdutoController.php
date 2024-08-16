<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PedidoProduto;
use App\Models\Pedido;
use App\Models\Item;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create(Pedido $pedido)
    {
        $produtos = Item::all();
        return view('app.pedido_produto.create', ['pedido' => $pedido, 'produtos' => $produtos]);
    }

    public function store(Request $request, Pedido $pedido)
    {
        $configs = [
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'integer'
        ];

        $feedbacks = [
            'produto_id.exists' => 'O produto informado não existe',
            'integer' => 'O campo :attribute deve receber um número'
        ];

        $request->validate($configs, $feedbacks);

        $pedido->produtos()->attach([
            $request->get('produto_id') => ['quantidade' => $request->get('quantidade')]
        ]);

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(PedidoProduto $pedidoProduto, Pedido $pedido)
    {
        $pedidoProduto->delete();
        return redirect()->route('pedido-produto.create', ['pedido' => $pedido]);
    }
}
