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

Route::get('/', ['as' => 'form', function () {
    return view('form');
}]);

Route::get('form', ['as' => 'form', function () {
    return view('form');
}]);

Route::get('form/success', ['as' => 'form.success', function () {
    return view('success');
}]);

Route::post('form', ['as' => 'form.submit',  'uses' => 'NoteController@store']);

Route::get('box/{hash}', 'NoteController@show');

Route::get('about', ['as' => 'about',  function () {
    return view('about');
}]);
