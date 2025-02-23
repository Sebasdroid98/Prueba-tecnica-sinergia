<?php

use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;
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

/* storage link */
Route::get('storage-link', function(){
    Artisan::call('storage:link');
    return redirect('/')->with('success','Se generó el enlace correctamente.');
})->middleware('auth');

Route::controller(PacienteController::class)->group(function() {
    Route::get('dashboard','index')->name('dashboard');
    Route::get('paciente-create', 'create')->name('paciente.create');
    Route::get('paciente-edit/{id}', 'edit')->name('paciente.edit');
    Route::get('paciente-status/{id}', 'estadoPaciente')->name('paciente.status');
    Route::post('paciente-store', 'store')->name('paciente.store');
    Route::put('paciente-update/{id}', 'update')->name('paciente.update');
    Route::delete('paciente-delete/{id}', 'destroy')->name('paciente.delete');
    Route::get('obtener-municipios-depto/{id}', 'obtenerMunicipiosDeptoById')->name('obtener-municipios-depto');
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
