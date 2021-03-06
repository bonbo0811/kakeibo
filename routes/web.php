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
    return view('kakeibo.top');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/kakeibo', [App\Http\Controllers\DetailController::class, 'regist'])->name('regist');
Route::post('/store', [App\Http\Controllers\DetailController::class, 'store'])->name('store');
Route::get('/list', [App\Http\Controllers\DetailController::class, 'list'])->name('list');
Route::get('/eat', [App\Http\Controllers\DetailController::class, 'eat'])->name('eat');
Route::get('/dat', [App\Http\Controllers\DetailController::class, 'dat'])->name('dat');
Route::get('/wor', [App\Http\Controllers\DetailController::class, 'wor'])->name('wor');
Route::get('/uti', [App\Http\Controllers\DetailController::class, 'uti'])->name('uti');
Route::get('/mov', [App\Http\Controllers\DetailController::class, 'mov'])->name('mov');
Route::get('/ent', [App\Http\Controllers\DetailController::class, 'ent'])->name('ent');
Route::get('/etc', [App\Http\Controllers\DetailController::class, 'etc'])->name('etc');
Route::get('/daily', [App\Http\Controllers\DetailController::class, 'daily'])->name('daily');
Route::get('/edit/{id}', [App\Http\Controllers\DetailController::class, 'edit'])->name('edit');
Route::post('/change/{id}', [App\Http\Controllers\DetailController::class, 'change'])->name('change');
Route::post('/delete/{id}', [App\Http\Controllers\DetailController::class, 'delete'])->name('delete');