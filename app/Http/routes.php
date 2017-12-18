<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');

    //Authentication-related routes
    Route::auth();

    Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin'] ], function() {

        //Books-related routes
        Route::resource('books', 'BookController', ['only' => ['index', 'create', 'store']]);
        Route::get('/books/{book}/edit', 'BookController@edit');
        Route::put('/books/{book}', 'BookController@update');
        Route::delete('/books/{book}', 'BookController@destroy');

        //Members-related routes
        Route::resource('members', 'UserController', ['only' => ['index', 'create', 'store']]);
        Route::get('/members/{user}/edit', 'UserController@edit');
        Route::put('/members/{user}', 'UserController@update');
        Route::delete('/members/{user}', 'UserController@destroy');

        //Report-related routes
        Route::get('report', 'ReportController@index');
    });

    Route::group(['prefix' => 'member', 'middleware' => ['auth','member'] ], function() {

        //Books-related routes
        Route::get('books', 'BookController@index');
        Route::get('books/search', 'BookController@search');
        Route::post('books/{book}/borrow', 'BookController@borrow');
        Route::post('books/{book}/return', 'BookController@return');
    });
});
