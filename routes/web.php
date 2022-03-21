<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//Invitation
Route::get('invitations/{invitation}/accept', 'App\Http\Controllers\Invitation@accept')->name('invitations.accept');
Route::get('invitations/{invitation}/reject', 'App\Http\Controllers\Invitation@accept')->name('invitations.reject');
Route::resource('invitations', 'App\Http\Controllers\Invitation');

//User
Route::resource('users', 'App\Http\Controllers\User');

//Event
Route::resource('events', 'App\Http\Controllers\Event');


