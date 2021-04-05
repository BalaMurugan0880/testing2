<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('vendorreg', function () {
    return view('vendor/vendorreg');
});

Route::get('companyreg', function () {
    return view('vendor/companyreg');
});

Route::get('vendormain', function () {
    return view('vendormain');
});

Route::get('companydetails', function () {
    return view('vendor/companydetails');
});

Route::get('addfood', function () {
    return view('vendor/addfood');
});

Route::get('itemdetails', function () {
    return view('vendor/itemdetails');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/registerVendor', 'vendorRegController@store');

Route::get('/companyreg', 'companyregisterController@index')->middleware('verified');
Route::post('/companyreg', 'companyregisterController@store')->middleware('verified');

Route::get('/companydetails', 'companydetailsController@index')->middleware('verified');
Route::post('/companydetails', 'companydetailsController@update')->middleware('verified');

Route::get('/addfood', 'foodController@index')->middleware('verified');
Route::post('/addfood', 'foodController@store')->middleware('verified');
Route::post('/addfood1', 'foodController@storeitem')->middleware('verified');
Route::post('/addfood2', 'foodController@storeadditemcat')->middleware('verified');
Route::post('/addfood3', 'foodController@storeadditem')->middleware('verified');

Route::get('/itemdetails', 'itemdetailsController@index')->middleware('verified');
Route::post('/itemdetails', 'itemdetailsController@store')->middleware('verified');
