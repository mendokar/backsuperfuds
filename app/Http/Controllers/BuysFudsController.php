<?php

namespace App\Http\Controllers;

use App\buys_fuds;
use Illuminate\Http\Request;

class BuysFudsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            $buys_fuds = new buys_fuds();
            $buys_fuds->buys_fuds = buys_fuds::all();
            $buys_fuds->response = "OK";
            $buys_fuds->message = "Consulta Existosa.";
            return response()->json($buys_fuds, 200);
        } catch (\Throwable $th) {
            $buys_fuds = new buys_fuds();
            $buys_fuds->response = "ERROR";
            $buys_fuds->message = "Error en la consulta, intente de nuevo.";
            return response()->json($buys_fuds, 204);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            $buys_fuds = new buys_fuds();
            $buys_fuds->customer_name = $request->input('customer_name');
            $buys_fuds->pro_name = $request->input('pro_name');
            $buys_fuds->cant = $request->input('cant');
            $buys_fuds->total = $request->input('total');
            $buys_fuds->save();
            $buys_fuds = new buys_fuds();
            $buys_fuds->response = "OK";
            $buys_fuds->message = "Registro Exitoso.";
            return response()->json($buys_fuds, 201);           
        } catch (\Throwable $th) {
            $buys_fuds = new buys_fuds();
            $buys_fuds->response = "ERROR$th";
            $buys_fuds->message = "Error en el registro, intente de nuevo.";
            return response()->json($th, 204);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\buys_fuds  $buys_fuds
     * @return \Illuminate\Http\Response
     */
    public function show(buys_fuds $buys_fuds)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\buys_fuds  $buys_fuds
     * @return \Illuminate\Http\Response
     */
    public function edit(buys_fuds $buys_fuds)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\buys_fuds  $buys_fuds
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, buys_fuds $buys_fuds)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\buys_fuds  $buys_fuds
     * @return \Illuminate\Http\Response
     */
    public function destroy(buys_fuds $buys_fuds)
    {
        //
    }
}
