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

Auth::routes();

  ////////////////////////////////
 ///      Admin ROUTE         ///
////////////////////////////////

Route::prefix('dashboard')->middleware(['auth', 'auth.admin'])->group(function () {
    /*Index page route*/
    Route::get('/', 'Admin\PagesController@index')->name('dashboard');

    /*Feedback page route*/
    Route::get('/feedback', 'Admin\FeedbackController@index');

    /*Profile page route*/
    Route::get('/school', 'Admin\SchoolController@index');

    /*Mobility page route*/
    Route::get('/mobility', 'Admin\MobilityController@index');

    /*Profile page route*/
    Route::get('/profile', 'Admin\PagesController@getProfile');
    Route::patch('/profile/{profile}', 'Admin\PagesController@updateProfile')->name('profile.update');

    /*State-City JSON route*/
    Route::get('school/get-state-list','Admin\SchoolController@getState');
    Route::get('school/get-city-list','Admin\SchoolController@getCities');

});

  ////////////////////////////////
 ///      Public ROUTE        ///
////////////////////////////////

    /*Index page route*/
    Route::get('/', 'PagesController@getIndex');

    /*About page route*/
    Route::get('about', 'PagesController@getAbout');

    /*Feedback page route*/
    Route::get('feed', 'PagesController@getFeedback');
    Route::post('feed', 'PagesController@sendFeedback')->name('send.feedback');

    /* Contact page route*/
    Route::get('contact', 'PagesController@getContact');
    Route::post('contact' , 'PagesController@sendContact');



