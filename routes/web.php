<?php

//use Illuminate\Support\Facades\Route;

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

//str_replace('\\', '/', app_path())

Route::get('/', 'AuthController@run');
require_once app_path() . '/Business/Miscs/Constants.php';

Route::get('/token', function () {
    return csrf_token();
});


Route::get('views/{page}', function ($page) {
    return view($page);
});