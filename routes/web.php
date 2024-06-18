<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClassLevelController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;

Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/', [LoginController::class, 'showLoginForm']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


    // transaksi 
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');

    Route::get('/transactions/print', [TransactionController::class, 'print'])->name('transactions.print');

    // transaction print by unit
    Route::get('/transactions/printUnit/{unitName}', [TransactionController::class, 'printUnit'])->name('transactions.printUnit');

    // transaction print by kelas
    Route::post('/transactions/printKelas', [TransactionController::class, 'storeKelas'])->name('transactions.printKelas');

    Route::post('/transactions/storeKelas', [TransactionController::class, 'storeKelas'])->name('transactions.storeKelas');

    //end transaksi



    Route::get('/api/get-class-data/{id_cl}', [ClassLevelController::class, 'getClassData']);

    Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy'])->name('transactions.destroy');

    Route::get('/transactions/{transaction}/print', [TransactionController::class, 'printTransaction'])->name('transactions.printTransaction');

    Route::post('transaction/printSelection', [TransactionController::class, 'printSelection'])->name('transactions.printSelectionTransaction');


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('class-levels', [ClassLevelController::class, 'index'])->name('class-levels');
    Route::get('/class-levels/{id}/edit', 'App\Http\Controllers\ClassLevelController@edit')->name('class-levels.edit');
    Route::put('class-levels/{id}', 'App\Http\Controllers\ClassLevelController@update')->name('class-levels.update');
    Route::get('class-levels/create', 'App\Http\Controllers\ClassLevelController@create')->name('class-levels.create');
    Route::post('class-levels', 'App\Http\Controllers\ClassLevelController@store')->name('class-levels.store');

    Route::delete('class-levels/{id}', 'App\Http\Controllers\ClassLevelController@destroy')->name('class-levels.destroy');
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('users', [UsersController::class, 'store'])->name('users.store');
    Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
});



Route::get('/home', function () {
    return redirect('/dashboard');
});
