<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Files\FilesCreateController;
use App\Http\Controllers\Files\FilesListController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Download\DownloadController;
use App\Http\Controllers\Files\FilesDeleteController;

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

Route::group(['prefix' => 'files', 'middleware' => 'jwt.verify'], function () {
    Route::post('/', FilesCreateController::class)->name('files.create');
    Route::get('/', FilesListController::class)->name('files.list');
    Route::delete('/{id}', FilesDeleteController::class)->name('files.delete');
});

Route::post('/login', LoginController::class)->name('login');

Route::get('/download/{name}', DownloadController::class)->name('download.invoke');
