<?php
use App\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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
    Route::get('feedback/{feedback}', 'Admin\FeedbackController@show')->name('feedback.show');
    Route::get('feedback', 'Admin\FeedbackController@index')->name('feedback.index');
    Route::get('feedback/{id}/edit', 'Admin\FeedbackController@edit')->name('feedback.edit');
    Route::post('feedback/update', 'Admin\FeedbackController@update')->name('feedback.update');
    Route::get('feedback/delete/{id}', 'Admin\FeedbackController@destroy')->name('feedback.delete');

    /*School page route*/
    Route::get('school', 'Admin\SchoolController@index')->name('school.index');
    Route::post('school', 'Admin\SchoolController@store')->name('school.store');
    Route::get('school/delete/{id}', 'Admin\SchoolController@destroy')->name('school.delete');
    Route::get('school/{id}/edit', 'Admin\SchoolController@edit')->name('school.edit');

    /*Mobility page route*/
    Route::resource('mobility', 'Admin\MobilityController');
    Route::get('mobility/delete/{id}', 'Admin\MobilityController@destroy')->name('mobility.delete');
    Route::get('mobility/{id}/edit', 'Admin\MobilityController@edit')->name('mobility.edit');

    /*Profile page route*/
    Route::get('profile', 'Admin\PagesController@getProfile')->name('profile.index');
    Route::patch('profile/{profile}', 'Admin\PagesController@updateProfile')->name('profile.update');

    /*State-City JSON route*/
    Route::get('school/get-state-list','Admin\SchoolController@getState');
    Route::get('school/get-city-list','Admin\SchoolController@getCities');

    /*LogActivity route*/
    Route::get('logs', 'Admin\LogActivityController@logActivity')->name('log.index');
    Route::get('logs/delete-all', 'Admin\LogActivityController@destroyAll')->name('log.delete-all');

});

  ////////////////////////////////
 ///      Public ROUTE        ///
////////////////////////////////

    /*Index page route*/
    Route::get('/', 'PagesController@getIndex');

    Route::get('/challenge/{challenge}', 'PagesController@getChallenge')->name('public.mobility.show');
    Route::get('challenge', 'PagesController@getAllChallenges')->name('public.mobility.challenges');
    Route::get('erasmus', 'PagesController@getErasmusChallenges')->name('public.mobility.erasmus');
    Route::get('ceepus', 'PagesController@getCeepusChallenges')->name('public.mobility.ceepus');
    Route::post('interest', 'PagesController@interestChallenge')->name('interest.challenges');
    Route::post('undointerest', 'PagesController@undointerestChallenge')->name('undointerest.challenges');

    /*About page route*/
    Route::get('about', 'PagesController@getAbout')->name('about.index');

    Route::get('prihlas', 'PagesController@getLogin')->name('prihlas.index');

  

    /*Challenge route*/
    Route::get('mychallenge', 'PagesController@getMyChallenges')->name('mychallenges');
    Route::get('mychallenge/{id}/delete', 'PagesController@deleteMyChallenge')->name('deleteMyChallenge');

    /*Feedback page route*/
    Route::get('feed', 'PagesController@getFeedback');
    Route::post('feed', 'PagesController@sendFeedback')->name('send.feedback');
    Route::get('myfeed', 'PagesController@getMyFeedback')->name('myfeedback');
    Route::get('myfeed/{id}/edit' , 'PagesController@editMyFeedback')->name('myfeedback.edit');
    Route::post('myfeed', 'PagesController@updateMyFeedback')->name('myfeedback.update');


    /* Contact page route*/
    Route::get('contact', 'PagesController@getContact');
    Route::post('contact' , 'PagesController@sendContact');



