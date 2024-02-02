<?php

use App\Http\Controllers\DiagnoseFormController;
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

Route::group(
    [
        'prefix' => 'diagnose/form',
        'as' => 'diagnose.form.',
    ],
    function () {
        Route::get('/', [DiagnoseFormController::class, 'index'])->name('index');

        Route::get('/form1', [DiagnoseFormController::class, 'form1'])->name('form1');
        Route::post('/form1', [DiagnoseFormController::class, 'form1Store'])->name('form1.store');

        Route::get('/form2', [DiagnoseFormController::class, 'form2'])->name('form2');
        Route::post('/form2', [DiagnoseFormController::class, 'form2Store'])->name('form2.store');

        Route::get('/form3', [DiagnoseFormController::class, 'form3'])->name('form3');
        Route::post('/form3', [DiagnoseFormController::class, 'form3Store'])->name('form3.store');

        Route::get('/result', [DiagnoseFormController::class, 'result'])->name('result');
    }
);
