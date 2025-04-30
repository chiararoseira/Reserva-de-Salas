<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservaController; // Importação do ReservaController
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect('/reservas'); // Redireciona para a página de reservas
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas para o ReservaController
    Route::resource('reservas', ReservaController::class);
});

require __DIR__.'/auth.php';
