<?php

use App\Events\MessageNotification;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\RandomDataController;
use App\Http\Controllers\GoogleDriveController;
use App\Http\Controllers\TermsAndConditionsController;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;



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

Route::get('/home', function() {
    return view('home');
});

Route::get('/event', function(){
    event(new MessageNotification('Hello World'));
    return 'Event has been broadcasted!';
});

Route::get('/listen', function(){
    return view('listen');
});

Route::get('/drive', function(){
    return view('gdrive');
});

Route::get('/terms-and-conditions', function(Request $request){
    // Check if the 'clicked' query parameter exists and set session accordingly
    if ($request->has('clicked')) {
        Session::put('terms_clicked', true);
    }

    return view('crudbooster.terms_and_conditions');
})->name('terms.and.conditions');


Route::get('/google-drive/folders', [GoogleDriveController::class, 'getAllFolders']);

Route::get('/welcome/{userId}', [WelcomeController::class, 'showWelcome'])->name('welcome')->middleware('check.welcome.access');
Route::post('/welcome/{userId}', [WelcomeController::class, 'acknowledgeWelcome'])->name('acknowledge.welcome')->middleware('check.welcome.access');
Route::post('/welcome', [WelcomeController::class, 'cancelWelcome'])->name('cancel.welcome');


// Route::get('/welcome', [WelcomeController::class, 'showWelcome'])->name('welcome');
// Route::post('/acknowledge-welcome', [WelcomeController::class, 'acknowledgeWelcome'])->name('acknowledge.welcome');
// Route::post('/welcome', [WelcomeController::class, 'cancelWelcome'])->name('cancel.welcome');
 

Route::get('/signin', [SigninController::class, 'create'])->name('signin');
Route::post('/signin', [SigninController::class, 'store']);

Route::resource('files',FileController::class);

Route::prefix('download')->group(function (){
    Route::get('/', [DownloadController::class, 'index'])->name('download');
    Route::get('/employees', [DownloadController::class, 'download'])->name('export.employees.db');
    Route::get('/students', [DownloadController::class, 'download'])->name('export.students.db');
    Route::get('/exported-file-url', [DownloadController::class, 'downloadExportedFile'])->name('download.exported.file');
});

// Upload Routes
Route::prefix('upload')->group(function () {
    Route::get('/', [UploadController::class, 'showUploadForm'])->name('upload.form');
    Route::post('/', [UploadController::class, 'upload'])->name('upload');
    Route::get('/employee', [UploadController::class, 'showUploadForm'])->name('upload.employee.form');
    Route::post('/employee', [UploadController::class, 'uploadEmployee'])->name('upload.employee');
    Route::get('/student', [UploadController::class, 'showUploadForm'])->name('upload.student.form');
    Route::post('/student', [UploadController::class, 'importStudents'])->name('upload.student');
});

// Export Routes
Route::prefix('export')->group(function () {
    Route::get('/users', [ExportController::class, 'exportUsers'])->name('export.users');
    Route::get('/users-chunk', [ExportController::class, 'exportUsersChunk'])->name('export.chunk');
    Route::get('/random-employees', [ExportController::class, 'generateRandomData'])->name('random.employees');
    Route::get('/random-students', [ExportController::class, 'generateRandomData'])->name('random.students');
});