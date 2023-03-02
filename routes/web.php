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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->name('admin.')
    ->prefix('admin/')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::view('index', 'admin.index')->name('index');

        Route::view('booking/index', 'admin.booking.index')->name('booking.index');

        Route::view('books', 'admin.books.index')->name('books.index');

        Route::view('setting-user/user', 'admin.setting-user.user.index')->name('setting-user.user.index');
        Route::view('setting-user/positions', 'admin.setting-user.positions.index')->name('setting-user.positions.index');
        Route::view('setting-user/title', 'admin.setting-user.title.index')->name('setting-user.title.index');

        Route::view('reports/booking', 'admin.reports.booking.index')->name('reports.booking.index');

        Route::view('reports/book', 'admin.reports.book.index')->name('reports.book.index');


    });
