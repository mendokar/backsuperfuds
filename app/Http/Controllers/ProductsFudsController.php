<?php

namespace App\Http\Controllers;

use App\products_fuds;
use Illuminate\Http\Request;

class ProductsFudsController extends Controller
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
            $product_fuds = new products_fuds();
            $product_fuds->products_fuds = products_fuds::all();
            $product_fuds->response = "OK";
            $product_fuds->message = "Consulta Existosa.";
            return response()->json($product_fuds, 200);
        } catch (\Throwable $th) {
            $product_fuds = new products_fuds();
            $product_fuds->response = "ERROR";
            $product_fuds->message = "Error en la consulta, intente de nuevo.";
            return response()->json($product_fuds, 204);
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

            $products_fuds = new products_fuds();
            $product = $request->input('pro_name');
            $products_fuds=products_fuds::where('pro_name', '=', $product)->first();
            if($products_fuds !== null){
                $pro_desc = $request->input('pro_desc');
                $pro_name = $request->input('pro_name');                   
                $products_fuds ->where('pro_name', $pro_name) ->update(['pro_desc' => $pro_desc]); 
                $products_fuds = new products_fuds();
                $products_fuds->response = "OK";
                $products_fuds->message = "El producto $pro_name ya se encuentra registrado, ingrese un nuevo producto.";
                return response()->json($products_fuds, 201);
            }else{
                $products_fuds = new products_fuds();
                $products_fuds->pro_name = $request->input('pro_name');
                $products_fuds->pro_desc = $request->input('pro_desc');
                $products_fuds->save();
                $products_fuds = new products_fuds();
                $products_fuds->response = "OK";
                $products_fuds->message = "Registro Exitoso.";
                return response()->json($products_fuds, 201);
            }
        } catch (\Throwable $th) {
            $products_fuds = new products_fuds();
            $products_fuds->response = "ERROR".$th;
            $products_fuds->message = "Error en el registro, intente de nuevo.";
            return response()->json($products_fuds, 204);
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\products_fuds  $products_fuds
     * @return \Illuminate\Http\Response
     */
    public function show(products_fuds $products_fuds)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\products_fuds  $products_fuds
     * @return \Illuminate\Http\Response
     */
    public function edit(products_fuds $products_fuds)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\products_fuds  $products_fuds
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, products_fuds $products_fuds)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\products_fuds  $products_fuds
     * @return \Illuminate\Http\Response
     */
    public function destroy(products_fuds $products_fuds)
    {
        //
    }
}
