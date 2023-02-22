<?php

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

// Route::view('/admin/index', 'admin.index')->name('index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::view('/admin/index', 'admin.index')->name('admin.index');


    Route::view('/admin/booking/index', 'admin.booking.index')->name('admin.booking.index');




    Route::view('/admin/setting-user/user/index', 'admin.setting-user.user.index')->name('admin.setting-user.user.index');
    


    Route::view('/admin/setting-user/positions', 'admin.setting-user.positions')->name('admin.setting-user.positions');

});
