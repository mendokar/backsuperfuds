<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Se construye la ruta del nuevo controlador que se va a usar
 * de tipo API para productos
 */
Route::resource('products_fuds','ProductsFudsController');

/**
 * Se construye la ruta del nuevo controlador que se va a usar
 * de tipo API para registrar el stock
 */
Route::resource('stock_fuds','StocksFudsController');

/**
 * Se construye la ruta del nuevo controlador que se va a usar
 * de tipo API para registrar los clientes
 */
Route::resource('customer_fuds','CustomersFudsController');

/**
 * Se construye la ruta del nuevo controlador que se va a usar
 * de tipo API para registrar las ventas realizadas
 */
Route::resource('buys_fuds','BuysFudsController');


