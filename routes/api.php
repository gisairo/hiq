<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/smartdevice/create', 'SmartDeviceController@store');
Route::get('/smartdevice/edit/{id}', 'SmartDeviceController@edit');
Route::post('/smartdevice/update/{id}', 'SmartDeviceController@update');
Route::delete('/smartdevice/delete/{id}', 'SmartDeviceController@delete');
Route::get('/smartdevices', 'SmartDeviceController@index');
Route::get('/manufacturers', 'SmartDeviceController@manufacturers');
