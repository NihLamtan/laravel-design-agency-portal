<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Api\ServicesController as ServicesApiController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('test', function(Request $request){
    return $request->all();
});



Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'authenticate_admin'], function () {
    Route::get('service_categories/{id}/services', [ServicesApiController::class, 'index']);
});
