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
Route::get('auth/admin/login', 'Auth\AuthController@index');
Route::post('auth/admin/login', 'Auth\AuthController@login') -> name('adminLogin');

/*============= Login ============*/
Route::get('admin', 'Admin\AdminController@index');


/*============= Web ============*/
Route::get("/{any}", function(){
    return view('home');
}) -> where([ "any" => ".*" ]); 