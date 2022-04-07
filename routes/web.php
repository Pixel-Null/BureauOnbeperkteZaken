<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\VideoController;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

// Contact Routes
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index']);
Route::post('index', [App\Http\Controllers\ContactController::class, 'store'])->name('store');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('index');

Route::get('/onbeperkt-anders', [VideoController::class, 'get']);

Route::get('/content_upload', [ProjectController::class, 'fileUpload']);
Route::post('/content_upload', [ProjectController::class, 'storeFile']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
