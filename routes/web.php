<?php

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
// use App\Mail\SupportMailManager;

//Home Page
Route::get('/', 'HomeController@index')->name('home');

Route::get('/clear',function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    // return 'Clear All Successfully';
    return view('backend.miscellaneous.clear_cache');
})->name('clear');
