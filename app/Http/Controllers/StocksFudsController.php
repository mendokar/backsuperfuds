<?php

namespace App\Http\Controllers;

use App\stocks_fuds;
use Illuminate\Http\Request;

class StocksFudsController extends Controller
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
            $stocks_fuds = new stocks_fuds();
            $stocks_fuds->stocks_fuds = stocks_fuds::all();
            $stocks_fuds->response = "OK";
            $stocks_fuds->message = "Consulta Existosa.";
            return response()->json($stocks_fuds, 200);
        } catch (\Throwable $th) {
            $stocks_fuds = new stocks_fuds();
            $stocks_fuds->response = "ERROR";
            $stocks_fuds->message = "Error en la consulta, intente de nuevo.";
            return response()->json($stocks_fuds, 204);
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
             //
             try {
                $stocks_fuds = new stocks_fuds();
                $product = $request->input('pro_name');
                $stocks_fuds=stocks_fuds::where('pro_name', '=', $product)->first();
                if($stocks_fuds !== null){
                    $cant_pro = $stocks_fuds->cant_pro + $request->input('cant_pro');
                    $pro_name = $request->input('pro_name');                   
                    $stocks_fuds ->where('pro_name', $pro_name) ->update(['cant_pro' => $cant_pro]); 
                    $stocks_fuds = new stocks_fuds();
                    $stocks_fuds->response = "OK";
                    $stocks_fuds->message = "Actualización de Stock de $pro_name exitoso.";
                    return response()->json($stocks_fuds, 201);
                }else{      
                    $stocks_fuds = new stocks_fuds();                    
                    $stocks_fuds->pro_name = $request->input('pro_name');
                    $stocks_fuds->cant_pro = $request->input('cant_pro');
                    $stocks_fuds->num_lote = $request->input('num_lote');
                    $stocks_fuds->price = $request->input('price');
                    $stocks_fuds->date_exp = $request->input('date_exp');
                    $stocks_fuds->save();
                    $stocks_fuds = new stocks_fuds();
                    $stocks_fuds->response = "OK";
                    $stocks_fuds->message = "Registro Exitoso.";
                    return response()->json($stocks_fuds, 201);
                }
            } catch (\Throwable $th) {
                $stocks_fuds = new stocks_fuds();
                $stocks_fuds->response = "ERROR".$th;
                $stocks_fuds->message = "Error en el registro, intente de nuevo.";
                return response()->json($stocks_fuds, 204);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\stocks_fuds  $stocks_fuds
     * @return \Illuminate\Http\Response
     */
    public function show(stocks_fuds $stocks_fuds)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\stocks_fuds  $stocks_fuds
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$user_id)
    {
        //
        echo ("any");
       /* try {
            $stocks_fuds = new stocks_fuds();
            $product = $request->input('pro_name');
            $stocks_fuds=stocks_fuds::where('pro_name', '=', $product)->first();
            if($stocks_fuds !== null){
                $cant_pro = $stocks_fuds->cant_pro - $request->input('cant_minus');
                $pro_name = $request->input('pro_name');                   
                $stocks_fuds ->where('pro_name', $pro_name) ->update(['cant_pro' => $cant_pro]); 
                $stocks_fuds = new stocks_fuds();
                $stocks_fuds->response = "OK";
                $stocks_fuds->message = "Actualización de Stock de $pro_name exitoso.";
                return response()->json($stocks_fuds, 201);
            }
        } catch (\Throwable $th) {
            $stocks_fuds = new stocks_fuds();
            $stocks_fuds->response = "ERROR".$th;
            $stocks_fuds->message = "Error en el registro, intente de nuevo.";
            return response()->json($stocks_fuds, 204);
        }*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\stocks_fuds  $stocks_fuds
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        echo ("update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\stocks_fuds  $stocks_fuds
     * @return \Illuminate\Http\Response
     */
    public function destroy(stocks_fuds $stocks_fuds)
    {
        //
    }
}
