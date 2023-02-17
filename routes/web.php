<?php

use App\Models\Books;
use Illuminate\Support\Arr;
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
});

Route::get('/json', function (Books $books) {

    // Read the JSON file
    $old_biblio = file_get_contents('./../database/biblio.json');
    $old_collection = file_get_contents('./../database/collection_dm.json');
    // Decode the JSON file
    $old_biblio_data = json_decode($old_biblio, true);
    $old_collection_data = json_decode($old_collection, true);


    $collect_old_biblio = collect($old_biblio_data[2]['data']);
    $t1 = $collect_old_biblio->unique('topic1')->pluck('topic1');
    $t2 = $collect_old_biblio->unique('topic2')->pluck('topic2');
    $t3 = $collect_old_biblio->unique('topic3')->pluck('topic3');
    $t4 = $collect_old_biblio->unique('topic4')->pluck('topic4');
    $t5 = $collect_old_biblio->unique('topic5')->pluck('topic5');

    $collect_old_collection = collect($old_collection_data[2]['data']);






    // เตรียม import ลงตาราง tags
    $tags = collect(Arr::collapse([$t1, $t2, $t3, $t4, $t5]))->unique();

    dd($tags);

    // เตรียมลง books and book_tags

    // in maintenance........

    /*

     foreach ($collect as $key => $value) {
        $convert['title'] = $value['title'];
        $convert['title_remainder'] = $value['title_remainder'];
        $convert['title'] = $value['title'];
        $convert['title'] = $value['title'];
        $convert['title'] = $value['title'];
        $convert['title'] = $value['title'];
        $convert['title'] = $value['title'];
     }
   */
});
