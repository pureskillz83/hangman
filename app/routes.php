<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

// API Routes
Route::group(array('before' => 'auth.basic_api'), function () {
    Route::get('/api/guess/{letter}/{encrypted_word}', array(
        'as' => 'api-guess-letter',
        'uses' => 'WordController@guessLetter'
    ));
});

// GUI / Site Routes
Route::group(array('before' => 'auth.frontend'), function () {
    Route::get('/', array(
        'as' => 'home',
        'uses' => 'HomeController@index'
    ));
});
