<?php

use Illuminate\Support\Facades\Route;


// Rutas almacenadas 
// GET
Route::get('get', 'App\Http\Controllers\ConcesionarioController@getAllVehicles')->name('getAll');
Route::get('get/{id}', 'App\Http\Controllers\ConcesionarioController@getVehicleById')->name('getById');

// POST
Route::post('create', 'App\Http\Controllers\ConcesionarioController@createVehicle')->name('createVehicle');

// PUT
Route::put('update/{id}', 'App\Http\Controllers\ConcesionarioController@updateVehicle')->name('updateVehicle');

// DELETE
Route::delete('delete/{id}', 'App\Http\Controllers\ConcesionarioController@deleteVehicle')->name('deleteVehicle');