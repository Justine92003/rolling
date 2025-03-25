<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

// Default route
Route::get('/', function () {
    return view('welcome');
});

// Grouping routes under the 'roles' prefix
Route::prefix('roles')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('roles.index'); 
    Route::get('/create', [RoleController::class, 'create'])->name('roles.create'); 
    Route::post('/', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/{user}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/{user}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/{user}', [RoleController::class, 'destroy'])->name('roles.destroy');
});