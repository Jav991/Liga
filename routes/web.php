<?php

use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('equipos', EquipoController::class,)->except('index', 'show');
    Route::resource('partidos', PartidoController::class,);
    Route::get('/equipos/filtro/{nombre}', [EquipoController::class, 'filtro'])->name('equipos.filtro');
});

require __DIR__.'/auth.php';


Route::get('equipos', [EquipoController::class,  "index"])->name('equipos.index');
Route::get('equipos/{id}', [EquipoController::class,  "show"])->name('equipos.show');