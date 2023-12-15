<?php

use App\Http\Controllers\Clientes;
use App\Http\Controllers\Parrillas;
use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\PlataformasController;
use App\Livewire\Plataformas;
use App\Models\Asignaciones;
use App\Models\Publicaciones;
use Illuminate\Support\Facades\Auth;
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
    return view('plantilla');
});

/* Route::get('/prueba', function () {
    return view('admin.parrillas.lista');
}); */
Route::get('/prPubl', function () {
    return view('admin.parrillas.publicaciones.create');
});
Route::get('/prAsig', function () {
    return view('admin.asignaciones.lista');
});

Route::get('/prAdmin', function () {
    return view('admin.habilidades.create');
});
Route::get('/prTC', function () {
    return view('admin.tiposContenidos.create');
});
Route::get('/prEmpleados', function () {
    return view('admin.empleados.create');
});

Route::get('/prAdm', function () {
    return view('admin.administradores.create');
});

Auth::routes(['verify' => false]);

Route::group(['middleware' => 'auth'], function(){

    //ADMIN-ADMINISTRADORES
    // Crear administrador
    Route::get('/admin/clientes/administradores/lista', [AdministradoresController::class, 'index'])->name('listaAdministradores');
    Route::get('/admin/clientes/administradores/create', [AdministradoresController::class, 'create'])->name('crearAdministrador');
    Route::post('/admin/clientes/administradores/create', [AdministradoresController::class, 'save'])->name('saveAdministrador');
    Route::get('/admin/clientes/administradores/edit/{id}', [AdministradoresController::class, 'edit'])->name('editAdministrador');
    Route::post('/admin/clientes/administradores/edit/{id}', [AdministradoresController::class, 'update'])->name('updateAdministrador');


    //ADMIN-CLIENTES
    Route::get('/admin/clientes', [Clientes::class, 'create'])->name('crearCliente');
    //Crear cliente
    Route::post('/admin/Crear-cliente', [Clientes::class, 'save'])->name('saveCliente');
    //Listar clientes
    Route::get('/admin/lista-clientes', [Clientes::class, 'index'])->name('listaClientes');
    //editar-clientes
    Route::get('/admin/edit/{cliente}', [Clientes::class, 'edit'])->name('editCliente');
    Route::put('/admin/update/{cliente}', [Clientes::class, 'update'])->name('updateCliente');

    //PLATAFORMAS-CLIENTES
    // Rutas para plataformas dentro del contexto del cliente
    Route::get('/admin/clientes/plataformas/create/{id}', [PlataformasController::class, 'create'])->name('crearPlataforma');
    // Guardar plataformas
    Route::post('/admin/clientes/plataformas/create/', [PlataformasController::class, 'save'])->name('savePlataforma');
    
    //ADMIN-PARRILLAS
    Route::get('admin/parrillas', [Parrillas::class, 'create'])->name('crearParrilla');
    //Crear parrilla
    Route::post('/admin/Crear-parrilla', [Parrillas::class, 'save'])->name('saveParrilla');
    //Listar parrillas
    Route::get('/admin/lista-parrillas', [Parrillas::class, 'index'])->name('listaParrillas');
    //editar-parrillas
    Route::get('/admin/edit/{parrilla}', [Parrillas::class, 'edit'])->name('editParrilla');
    Route::put('/admin/update/{parrilla}', [Parrillas::class, 'update'])->name('updateParrilla');



    //ADMIN-PUBLICACIONES
    Route::get('/prPubl', function () {return view('admin.parrillas.publicaciones.create');
    })->name('crearPublicacion');

    Route::get('/prPubl', function () {
        return view('admin.parrillas.publicaciones.edit');})->name('editPublicacion');

    Route::get('/admin/parrillas/publicaciones/create/', function () {
        return view('admin.parrillas.publicaciones.create');
    })->name('createPublicacion');
    //Crear publicacion
    Route::post('/admin/parrillas/publicaciones/create/', [Publicaciones::class, 'save'])->name('savePublicacion');
    //Listar publicaciones
    //Route::get('/admin/edit/{idParrilla}', [Publicaciones::class, 'edit'])->name('editPublicacion');
    //Route::put('/admin/update/{idParrilla}', [Publicaciones::class, 'update'])->name('updatePublicacion');
});
