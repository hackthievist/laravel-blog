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
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function() {
    // uses 'auth' middleware
    Route::resource('articles','ArticlesController');
    Route::get('articles/{id}/delete', ['uses' => 'ArticlesController@destroy', 'as' => 'delete']);
    Route::get('published', 'ArticlesController@published');
    Route::get('unpublished', 'ArticlesController@unpublished');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
