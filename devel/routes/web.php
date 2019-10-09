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

Route::get('/', function () {
    return view('public.pages.index');
});

Auth::routes();

  ////////////////////////////////
 ///      Admin ROUTE         ///
////////////////////////////////

Route::prefix('dashboard')->group(function () {
    Route::get('/', 'HomeController@index')->name('dashboard');

});

  ////////////////////////////////
 ///      Public ROUTE        ///
////////////////////////////////

    /*About page route*/
    Route::get('about', 'PagesController@getAbout');

    /*Connect page route*/
    Route::get('connect', 'PagesController@getConnect');
    /* Contact page route*/
    Route::get('contact', 'PagesController@getContact');
    Route::post('contact' , 'PagesController@sendContact');



