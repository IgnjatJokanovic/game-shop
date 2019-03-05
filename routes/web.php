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
    return view('layouts.home');
});

Route::get('/about', "Pages@about");

Route::get('/partners', "Pages@partners");

Route::get('/author', "Pages@author");

Route::get('/contact', "Pages@contact");

Route::get('/adm', function () {
    return view('layouts.admin');
});