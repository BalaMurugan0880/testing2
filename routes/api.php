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


Route::post('/registerVendor', 'vendorRegController@store');

Route::get('/companyreg', 'companyregisterController@index');
Route::post('/companyreg', 'companyregisterController@store');

Route::get('/companydetails', 'companydetailsController@index');
Route::post('/companydetails', 'companydetailsController@update');

Route::get('/addfood', 'foodController@index');
Route::post('/addfood', 'foodController@store');
Route::post('/addfood1', 'foodController@storeitem');
Route::post('/addfood2', 'foodController@storeadditemcat');
Route::post('/addfood3', 'foodController@storeadditem');
