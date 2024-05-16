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

Route::get('/student-upload', [UploadController::class, 'showStudentUploadForm'])->name('upload.student.form');
Route::post('/student-upload', [UploadController::class, 'importStudents'])->name('upload.student');

Route::get('/export-random-data', [RandomDataController::class, 'export'])->name('random.data');
Route::get('/export-users', [UploadController::class, 'exportUsers'])->name('export.users');
Route::get('/export-users-chunk', [UploadController::class, 'exportUsersChunk'])->name('export.chunk');
Route::get('/export-random-employees', [UploadController::class, 'exportEmployees'])->name('export.employees');
Route::get('/export-employees', [UploadController::class, 'exportEmployeeFromDb'])->name('export.employees.db');
Route::get('/exported-file-url', [UploadController::class, 'downloadExportedFile'])->name('download.exported.file');
Route::get('/export-random-students', [UploadController::class, 'generateRandomStudent'])->name('random.student');


