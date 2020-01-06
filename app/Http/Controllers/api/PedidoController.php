<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pedido;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pedido::with('pizza')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            return Pedido::create($request->only(['pizza_id','customer_name','customer_phone', 'customer_address']));
        } catch (\Throwable $e) {
            abort(400, 'Error while creating an Order.['.$e->getMessage().']');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($phone)
    {
        //Irá trazer todos os pedidos do cliente com o telefone informado
        return Pedido::with('pizza')->where('customer_phone', '=', $phone)->get();
    }

}
