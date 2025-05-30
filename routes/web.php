<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\TipoProductoController;
use App\Http\Controllers\SubTipoProductoController;
use App\Http\Controllers\GrupoInvestigacionController;
use App\Http\Controllers\HorasInvestigacionController;
use App\Http\Controllers\InvestigadorController;
use App\Http\Controllers\ProductoInvestigativoController;
use App\Http\Controllers\ProyectoInvestigacionController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('dashboard', Dashboard::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::resource('grupos-investigacion', GrupoInvestigacionController::class)
    ->middleware(['auth', 'verified']);

Route::resource('productos-investigativos', ProductoInvestigativoController::class)
    ->middleware(['auth', 'verified']);

Route::resource('proyecto-investigacion', ProyectoInvestigacionController::class)
    ->middleware(['auth', 'verified']);

Route::resource('investigadores', InvestigadorController::class)
    ->middleware(['auth', 'verified']);

Route::resource('horas-investigacion', HorasInvestigacionController::class)
    ->middleware(['auth', 'verified']);
    
Route::get('horas-investigacion/investigador/{user}', [HorasInvestigacionController::class,'showInvestigador'])
    ->middleware(['auth', 'verified'])
    ->name('horas-investigacion.investigador');

// Rutas parametros
Route::prefix('parametros')->name('parametros.')->group(function () {
    Route::resource('periodos', PeriodoController::class)
        ->middleware(['auth', 'verified']);

    Route::resource('tipo-productos', TipoProductoController::class)
        ->middleware(['auth', 'verified']);
    Route::resource('subtipo-productos', SubTipoProductoController::class)
        ->middleware(['auth', 'verified']);
});
// Route::resource('periodos', PeriodoController::class)
// ->middleware(['auth', 'verified']);
// ->name('periodos');

require __DIR__.'/auth.php';
