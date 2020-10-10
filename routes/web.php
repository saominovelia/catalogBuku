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

//route admin dilindungi oleh middleware checkAdmin
Route::prefix('admin')->middleware('checkAdmin')->group(function (){
    Route::get('/dashboard', 'AdminController@index')->name('admin');
});

Route::prefix('penerbit')->middleware('checkPenerbit')->group(function (){
    Route::get('/dashboard', 'PenerbitController@index')->name('penerbit');
});


Route::get('/login' , 'AuthController@index')->name('login');
Route::get('/register', 'AuthController@register');
Route::post('/postLogin', 'AuthController@login')->name('postLogin');
Route::post('/postRegister', 'AuthController@registration')->name('register');
Route::get('/logout', 'AuthController@logout')->name('logOut');



