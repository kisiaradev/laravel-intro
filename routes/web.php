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
    return view('contacts');
});

Auth::routes();

Route::get('/home', 'HomeController@here');

Route::post('post/contact', 'ContactsController@postContacts');
Route::get('contacts', 'ContactsController@index');


Route::get('contact/delete/{id}', 'ContactsController@removeContact');
Route::get('contact/edit/{id}', 'ContactsController@editContact');
Route::post('contact/edit/{id}', 'ContactsController@saveContactEdits');


