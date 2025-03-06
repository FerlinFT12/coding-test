<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KarakterController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('dashboard');

    Route::name('employee.')->prefix('employee')->group(function () {
        Route::post('/datatable', [EmployeeController::class, 'datatable'])->name('datatable');
        Route::resource('', EmployeeController::class, ['parameters' => ['' => 'id']]);
    });

    Route::name('report.')->prefix('report')->group(function () {
        Route::post('/datatable', [ReportController::class, 'datatable'])->name('datatable');
        Route::resource('', ReportController::class, ['parameters' => ['' => 'id']]);
    });
    
    Route::post('/karakter/datatable', [KarakterController::class, 'datatable'])->name('karakter.datatable');
    Route::get('/karakter', [KarakterController::class, 'index'])->name('karakter.index');
    Route::get('/karakter/create', [KarakterController::class, 'create'])->name('karakter.create');
    Route::get('/karakter/list', [KarakterController::class, 'list'])->name('karakter.list');
    Route::post('/cekPersenKarakter', [KarakterController::class, 'cekPersenKarakter'])->name('karakter.cekPersenKarakter');
});
