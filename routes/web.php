<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Artisan;
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

Auth::routes();

// Rotte private admin
Route::prefix('/')
->namespace('Admin')
->middleware('admin')
->group(function () {
    Route::resource('/admin', CreatorController::class, ['parameters' => [
    'admin' => 'creator'
]]);
});

// Rotte publiche (Home Page, Pagina Creator)
Route::get('/', 'GuestController@index')->name('guest.index');
Route::get('/{name}', 'GuestController@show')->name('guest.show');


