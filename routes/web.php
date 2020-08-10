<?php

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

//
include 'C:\Users\PC\Desktop\stuff\Final\GameLibrary\resources\views\src\functions.php';

Route::get('/', function()
{
    //return View::make('welcome')->with('returnArray', retrieve(100,false));
    $user = Auth::user();
    return view('welcome', compact('user'));
});

Route::get('/main/register', function()
{
    return View::make('register');
});

Route::get('/data', 'Controller@index');

Route::get('/login', 'MainController@index');
Route::post('/main/register', 'MainController@register');
Route::post('/main/checklogin', 'MainController@checklogin');
Route::get('/main/logout', 'MainController@logout');
