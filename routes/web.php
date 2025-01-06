<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['2fa'])->group(function (){

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/2fa', function (){
        return redirect(route('home'));
    })->name('2fa');
});

Route::get('/complete-registration', [RegisterController::class, 'completeRegistration'])->name('complete.registration');

Route::post('/save/sql-server', [ProductController::class, 'saveToSqlServer'])->name('save.sqlsrv');
Route::post('/save/oracle', [ProductController::class, 'saveToOracle'])->name('save.oracle');
Route::post('/save/pgsql', [ProductController::class, 'saveToPostgreSQL'])->name('save.pgsql');
Route::post('/save/all', [ProductController::class, 'saveToAllDatabases'])->name('save.all');
Route::get('/kpi', [ProductController::class, 'showKpi'])->name('kpi');
