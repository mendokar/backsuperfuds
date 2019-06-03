<?php

namespace App\Http\Controllers;

use App\customers_fuds;
use Illuminate\Http\Request;

class CustomersFudsController extends Controller
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
            $customers_fuds = new customers_fuds();
            $customers_fuds->customers_fuds = customers_fuds::all();
            $customers_fuds->response = "OK";
            $customers_fuds->message = "Consulta Existosa.";
            return response()->json($customers_fuds, 200);
        } catch (\Throwable $th) {
            $customers_fuds = new customers_fuds();
            $customers_fuds->response = "ERROR";
            $customers_fuds->message = "Error en la consulta, intente de nuevo.";
            return response()->json($customers_fuds, 204);
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
        try {
            $customers_fuds = new customers_fuds();
            $customer = $request->input('customer_name');
            $customers_fuds=customers_fuds::where('customer_name', '=', $customer)->first();
            if($customers_fuds !== null){
                $customer_phone = $request->input('customer_phone');  
                $customer_name = $request->input('customer_name');                   
                $customers_fuds ->where('customer_name', $customer_name) ->update(['customer_phone' => $customer_phone]); 
                $customers_fuds = new customers_fuds();
                $customers_fuds->response = "OK";
                $customers_fuds->message = "Actualización de usuario $customer_name exitoso.";
                return response()->json($customers_fuds, 201);
            }else{      
                $customers_fuds = new customers_fuds();                    
                $customers_fuds->customer_name = $request->input('customer_name');
                $customers_fuds->customer_phone = $request->input('customer_phone');               
                $customers_fuds->save();
                $customers_fuds = new customers_fuds();
                $customers_fuds->response = "OK";
                $customers_fuds->message = "Usuario registrado Exitoso.";
                return response()->json($customers_fuds, 201);
            }
        } catch (\Throwable $th) {
            $customers_fuds = new customers_fuds();
            $customers_fuds->response = "ERROR".$th;
            $customers_fuds->message = "Error en el registro, intente de nuevo.";
            return response()->json($customers_fuds, 204);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\customers_fuds  $customers_fuds
     * @return \Illuminate\Http\Response
     */
    public function show(customers_fuds $customers_fuds)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\customers_fuds  $customers_fuds
     * @return \Illuminate\Http\Response
     */
    public function edit(customers_fuds $customers_fuds)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\customers_fuds  $customers_fuds
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customers_fuds $customers_fuds)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\customers_fuds  $customers_fuds
     * @return \Illuminate\Http\Response
     */
    public function destroy(customers_fuds $customers_fuds)
    {
        //
    }
}
