<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\RandomDataController;

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

Route::get('/upload', [UploadController::class, 'showUploadForm'])->name('upload.form');
Route::post('/upload', [UploadController::class, 'upload'])->name('upload'); 

Route::get('/employee-upload', [UploadController::class, 'showEmployeeUploadForm'])->name('upload.employee.form');
Route::post('/employee-upload', [UploadController::class, 'uploadEmployee'])->name('upload.employee');

Route::get('/export-random-data', [RandomDataController::class, 'export'])->name('random.data');
Route::get('/export-users', [UploadController::class, 'exportUsers'])->name('export.users');
Route::get('/export-users-chunk', [UploadController::class, 'exportUsersChunk'])->name('export.chunk');
Route::get('/export-random-employees', [UploadController::class, 'exportEmployees'])->name('export.employees');

