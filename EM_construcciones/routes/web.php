<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

// Landing de EM Construcciones: sitio público sin cuentas, login ni sesiones.
Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/aviso-de-privacidad', [LandingController::class, 'privacidad'])->name('privacidad');
