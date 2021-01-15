<?php

use App\Http\Controllers\UploadController;
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

Route::get('enviar', [UploadController::class, 'formEnviar'])->name('upload.formEnviar');
Route::post('upload', [UploadController::class, 'upload'])->name('upload.upload');

Route::get('acompanhar', [UploadController::class, 'formAcompanhar'])->name('upload.formAcompanhar');
Route::post('acompanhar}', [UploadController::class, 'uploadDetails'])->name('upload.details');