<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AjaxDataController;
use App\Http\Controllers\UploadfileController;
use App\Http\Controllers\MainController;

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

Route::resource('student', StudentController::class);

Route::get('ajaxdata', [AjaxDataController::class, 'index'])->name('ajaxdata');
Route::get('ajaxdata/getdata', [AjaxDataController::class, 'getdata'])->name('ajaxdata.getdata');

Route::post('ajaxdata/postdata', [AjaxDataController::class, 'postdata'])->name('ajaxdata.postdata');
Route::get('ajaxdata/fetchdata', [AjaxDataController::class, 'fetchdata'])->name('ajaxdata.fetchdata');
Route::get('ajaxdata/removedata', [AjaxDataController::class, 'removedata'])->name('ajaxdata.removedata');

# Upload File
Route::get('/uploadfile', [UploadfileController::class, 'index']);
Route::post('/uploadfile/upload', [UploadfileController::class, 'upload'])->name('uploadfile.upload');

# Login
Route::get('/main', [MainController::class, 'index']);
Route::post('/main/checklogin', [MainController::class, 'checklogin']);
Route::get('main/successlogin', [MainController::class, 'successlogin']);
Route::get('main/logout', [MainController::class, 'logout']);
