<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ButacaController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('inicio');

	## Reserva ##

	Route::get('/reserva/sala',
		[ReservaController::class, 'index']
	)->name('reservaSala');	

	Route::post('/reserva/crear',
		[ReservaController::class, 'store']
	)->name('guardaReserva')->middleware('auth');	

	Route::get('/usuario/reserva',
		[ReservaController::class, 'reservaUsuarioActual']
	)->name('verMiReserva')->middleware('auth');	

	Route::get('/usuario/reserva/{idReserva}',
		[ReservaController::class, 'detalleReservaUsuarioActual']
	)->name('verDetalleReserva')->middleware('auth');	

	Route::put('/reserva/cambia/{idReserva}',
		[ReservaController::class, 'updateCancelaReserva']
	)->name('cancelaReserva');

	Route::delete('/reserva/elimina/{idReserva}',
		[ReservaController::class, 'eliminarReservaPorId']
	)->name('eliminaReserva');

	## Butacas ##

	Route::get('/reserva/sala/{nroSala}',
		[ButacaController::class, 'getButacaPorSala']
	)->name('reservaButaca')->middleware('auth');			

	## Usuario ##	

	Route::post('/usuario/crear',
		[UsuarioController::class, 'store']
	)->name('usuarioRegistro');	

	Route::post('/usuario/logueo',
		[UsuarioController::class, 'autenticarLogueo']
	)->name('usuarioLogueo');		

	Route::get('/usuario/acceder',
		[UsuarioController::class, 'verAcceder']
	)->name('acceder');	

	Route::get('/usuario/perfil',
		[UsuarioController::class, 'show']
	)->name('verPerfil')->middleware('auth');	

	Route::get('/usuario/salir',
		[UsuarioController::class, 'cerrarSesion']
	)->name('cerrarSesion')->middleware('auth');		




