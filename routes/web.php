<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\BlessController;
use App\Http\Controllers\GetFileUploadController;
use App\Http\Controllers\IndexController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware'=>'cacheResponse:3600'], function() {
// Route::group(['middleware'=>'doNotCacheResponse'], function() {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::post('signBless', [IndexController::class, 'store'])->name('index.sign.store');
    Route::get('signatureBless/{slug}', [IndexController::class, 'show'])->name('index.sign.show');
    
});

Route::group(['prefix'=>'backoffice', 'middleware' => 'doNotCacheResponse'], function () {
    Route::get('/', [BackendController::class, 'index'])->name('backoffice.index');
    Route::patch('updateStatus/{id}', [BackendController::class, 'update'])->name('backoffice.update');

    Route::get('manageBless', [BlessController::class, 'index'])->name('backoffice.bless.index');
    Route::get('createBless', [BlessController::class, 'create'])->name('backoffice.bless.create');
    Route::post('storeBless', [BlessController::class, 'store'])->name('backoffice.bless.store');
    Route::post('editBless', [BlessController::class, 'edit'])->name('backoffice.bless.edit');
    Route::patch('updateBless/{id}', [BlessController::class, 'update'])->name('backoffice.bless.update');
    Route::delete('destroyBless/{id}', [BlessController::class, 'destroy'])->name('backoffice.bless.destroy');
});

Route::group(['prefix'=>'getFilesUpload', 'middleware' => 'doNotCacheResponse'], function () {
    Route::get('getFileUpload/{folder_type}/{title_blasses_id}/{file_name}', [GetFileUploadController::class, 'getFileUpload'])->name('getFilesUpload');
});

Route::get('/response-cache',function(){
    Artisan::call('responsecache:clear');
    return "response-cache";
});

Route::get('/response-clear-cache/{url}',function($url){
    Artisan::call('responsecache:clear');
    
    return redirect()->route($url);
})->name('response-clear-cache');
