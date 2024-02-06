<?php

use App\Http\Controllers\DiagnoseFormController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RefInstansiController;
use App\Models\RefInstansi;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.',
        'middleware' => 'auth',
    ],
    function () {
        Route::view('dashboard', 'admin.dashboard')->name('dashboard');
        Route::resource('ref-instansi', RefInstansiController::class)->except('show');
    }
);

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


Route::middleware('auth')->group(function () {    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
