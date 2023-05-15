<?php


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
use Illuminate\Http\Request;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');

header('Content-Type: application/json; charset=UTF-8', true);


Route::get('/get_count_nums', 'PartOneController@get_count_nums');
Route::get('/get_value', 'PartOneController@get_value');
Route::get('/get_array_size', 'PartOneController@get_array_size');

/** Order Routes*/
Route::prefix('Order')->group(function()
{
    Route::post('/make_order', 'OrderController@make_order');
});

/** Order Routes*/
Route::prefix('Menu')->group(function()
{
    Route::get('/menu', 'MenuController@menu');
});

