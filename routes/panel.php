<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProjectController;
use App\Services\VideoService;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;

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

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('app/panel/home');
    })->name('home');


    Route::get('/new_project', [ProjectController::class, 'create'])->name('create_project');

    Route::post('/new_project', [ProjectController::class, 'store'])->name('store_project');

    Route::get('/add_user', [RegisteredUserController::class, 'create'])->name('create_user');
    Route::post('/add_user', [RegisteredUserController::class, 'store'])->name('add_user');

    Route::get('/content_upload', [ProjectController::class, 'fileUpload'])->name('fileUpload');
    Route::post('/content_upload', [ProjectController::class, 'storeFile'])->name('storeFile');

    Route::get('/template/{id}', [TemplateController::class, 'read'])->name('template.read');

    Route::get('/template/{template}/edit', [TemplateController::class, 'edit'])->name('template.edit');
    Route::put('/template/{template}/edit', [TemplateController::class, 'update'])->name('template.update');

    Route::get('template/{template}/block/create/{type}', [TemplateController::class, 'createBlock'])->name('block.create');
    Route::post('template/{template}/block/create/{type}', [TemplateController::class, 'storeBlock'])->name('block.store');

    Route::get('block/{block}/edit', [TemplateController::class, 'editBlock'])->name('block.edit');
    Route::put('block/{block}/edit', [TemplateController::class, 'updateBlock'])->name('block.update');
});
