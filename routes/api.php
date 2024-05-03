<?php

use Illuminate\Support\Facades\Route;


// Servico Laravel  
// GET
Route::get('get', 'App\Http\Controllers\ConcesionarioController@getAllVehicles')->name('getAll');
Route::get('get/{id}', 'App\Http\Controllers\ConcesionarioController@getVehicleById')->name('getById');

// POST
Route::post('create', 'App\Http\Controllers\ConcesionarioController@createVehicle')->name('createVehicle');

// PUT
Route::put('update/{id}', 'App\Http\Controllers\ConcesionarioController@updateVehicle')->name('updateVehicle');

// DELETE
Route::delete('delete/{id}', 'App\Http\Controllers\ConcesionarioController@deleteVehicle')->name('deleteVehicle');

// Conexión con Microservicio Java - Spring Boot
// GET
Route::get('clientes/get', 'App\Http\Controllers\ClienteController@getClientesSB')->name('getAllCliente');
Route::get('clientes/get/{id}', 'App\Http\Controllers\ClienteController@getClienteByIdSB')->name('getClienteById');

// POST
Route::post('clientes/create', 'App\Http\Controllers\ClienteController@createClienteSB')->name('createCliente');

// PUT
Route::put('clientes/update/{id}', 'App\Http\Controllers\ClienteController@updateClienteSB')->name('updateCliente');

// DELETE
Route::delete('clientes/delete/{id}', 'App\Http\Controllers\ClienteController@deleteClienteSB')->name('deleteCliente');
