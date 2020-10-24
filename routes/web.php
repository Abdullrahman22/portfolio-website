<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/*============= Login ============*/
Route::get('auth/admin/login', 'Auth\AuthController@index')-> middleware("guest")-> name('adminLogin');
Route::post('auth/admin/login', 'Auth\AuthController@login')-> name('adminLogin');

/*============= Admin ============*/
Route::group([ 'prefix' => 'admin' , 'namespace' => 'Admin' , 'middleware' => 'auth' ] , function(){
    // Admin Home Page 
    Route::get('/', 'AdminController@index') -> middleware("RedirectToMessegePage");
    // Admin Messeges Page 
    Route::get('/messeges', 'MessegeController@index');
    // Admin Projects Page 
    Route::get('/projects', 'ProjectController@index');
});

/*============= Web ============*/
Route::get("/{any}", function(){
    return view('home');
}) -> where([ "any" => ".*" ]);     