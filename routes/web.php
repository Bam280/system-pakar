<?php

use App\Http\Controllers\DiagnoseFormController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RefInstansiController;
use App\Models\RefInstansi;
use App\Http\Controllers\RefInterdepenController;
use App\Http\Controllers\RefTujuanController;
use App\Http\Controllers\RefFungsiController;
use App\Http\Controllers\IIVController;
use App\Http\Controllers\InterdepenController;
use App\Http\Controllers\UserController;
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
    return view('home.index');
});

Route::group(
    [
        'middleware' => 'auth',
    ],
    function () {
        Route::view('dashboard', 'pages.dashboard')->name('dashboard');
        Route::resource('iiv', IIVController::class)->except('show');
        Route::resource('interdepen', InterdepenController::class)->except('show');

        Route::group(['middleware' => 'can:admin-access'], function () {
            Route::resource('user', UserController::class)->except('show');
            Route::resource('ref-instansi', RefInstansiController::class)->except('show');
            Route::resource('ref-interdepen', RefInterdepenController::class)->except('show');
            Route::resource('ref-tujuan', RefTujuanController::class)->except('show');
            Route::resource('ref-fungsi', RefFungsiController::class)->except('show');        
        });
    }
);

Route::group(
    [
        'middleware' => 'auth',
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

        Route::get('/form4', [DiagnoseFormController::class, 'form4'])->name('form4');
        Route::post('/form4', [DiagnoseFormController::class, 'form4Store'])->name('form4.store');

        Route::get('/result', [DiagnoseFormController::class, 'result'])->name('result');
        Route::get('/result2', [DiagnoseFormController::class, 'result2'])->name('result2');
        Route::post('/result', [DiagnoseFormController::class, 'resultStore'])->name('result.store');

        Route::post('/reset', [DiagnoseFormController::class, 'reset'])->name('reset');

        Route::get('/print', [DiagnoseFormController::class, 'print'])->name('print');
    }
);


Route::middleware('auth')->group(function () {    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
