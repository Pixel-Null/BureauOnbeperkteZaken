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
<<<<<<< HEAD
    return view('app/home');
});

Route::get('/{page}', function ($page) {
    return view('app/' . $page);
});

Route::get('/login', function () {
    return redirect()->guest(route('panel'));
=======
    return view('home');
});

Route::get('/onbeperkt-anders', function () {
    return view('onbeperkt-anders');
>>>>>>> Opzetje video zichtbaar
});
