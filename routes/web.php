<?php

use Illuminate\Support\Facades\Route;

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
    return view('layout.master');
});

Route::resource('permission',\App\Http\Controllers\PermissionController::class);
Route::get('permission/{permissionId}/delete',[\App\Http\Controllers\PermissionController::class,'destroy']);

Route::resource('roles',\App\Http\Controllers\RoleController::class);
Route::get('roles/{roleId}/delete',[\App\Http\Controllers\RoleController::class,'destroy']);
Route::get('roles/{roleId}/give-permission',[\App\Http\Controllers\RoleController::class,'addPermissionToRole']);
Route::put('roles/{roleId}/give-permission',[\App\Http\Controllers\RoleController::class,'updatePermissionToRole']);

