<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PengalamanKerjaController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});
// Route::get('user', 'UserContoller@index');

// route versi lama
// Route::get('user', [UserController::class, 'welcome']);
Route::get('foo', function(){
    return 'hello world';
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/test', function () {
    return view('backend.layouts.template');
});

Route::group(['namespace' => 'App'], function(){
    Route::resource('dashboard', DashboardController::class);
    Route::resource('pengalaman_kerja', PengalamanKerjaController::class);
    Route::resource('pendidikan', PendidikanController::class);
});


Route::get('/session/create', [SessionController::class, 'create']);
Route::get('/session/show', [SessionController::class, 'show']);
Route::get('/session/delete', [SessionController::class, 'delete']);

Route::get('/pegawai/{nama}', [PegawaiController::class, 'index']);
Route::get('/formulir', [PegawaiController::class, 'formulir']);
Route::post('/formulir/proses', [PegawaiController::class, 'proses'])->name('pegawai');
Route::get('/eror500', [PegawaiController::class, 'eror500']);
Route::get('/eror403', [PegawaiController::class, 'eror403']);

// Route::get('home/profile', function () {
//     // ...
// })->middleware('auth');

