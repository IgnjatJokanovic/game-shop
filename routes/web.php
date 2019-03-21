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

Route::get('/', 'Games@index');

Route::get('/about', "Pages@about");

Route::get('/partners', "Pages@partners");

Route::get('/author', "Pages@author");

Route::get('/contact', "Pages@contact");

Route::get('/game/show/{id}', 'Games@show');

Route::get('/search', 'Games@search');

Route::get('/category', 'Games@perCategory');

Route::post('/sendMail', 'Pages@sendMail');

Route::post('/register', 'UsersController@store');

Route::get('/activate/{hash}', 'UsersController@activate');

Route::post('/login', 'UsersController@login');

Route::get('/logout', 'UsersController@logout');

Route::get('/rate', 'UsersController@rate');

Route::get('/add-to-cart', 'UsersController@addToCart');

Route::get('/showCart', 'UsersController@showCart');

Route::get('/remove-item', 'UsersController@removeItem');

Route::get('/update-numbers', 'UsersController@updateNumber');

Route::get('/checkout', 'UsersController@checkout');

Route::get('/download', 'UsersController@getDownload');
##ADMIN###

Route::middleware('check-role')->group(function(){

    Route::get('/dashboard', 'StatisticsController@orders');

    Route::get('/logins', 'StatisticsController@logins');

    Route::get('/registrations', 'StatisticsController@registrations');

    Route::get('/reviews', 'StatisticsController@reviews');

    Route::get('/game/insert', 'Games@insert');

    Route::post('/game/store', 'Games@store');

    Route::get('/game/combo', 'Games@combo');

    Route::post('/game/delete', 'Games@delete');

    Route::get('/game/update/{id}', 'Games@edit');

    Route::post('/game/updateBasic', 'Games@updateBasic');

    Route::post('/game/updateGalery', 'Games@updateGalery');

    Route::post('/game/UpdateCategory', 'Games@UpdateCategory');

    Route::post('/game/updateImage', 'Games@updateImage');

    Route::get('/game/activity', 'StatisticsController@games');

    Route::get('/pages/combo', 'Pages@combo');

    Route::get('/page/update/{id}', 'Pages@edit');

    Route::post('/page/updateImage', 'Pages@updateImage');

    Route::post('/page/updateContent', 'Pages@updateContent');

    Route::get('/page/activity', 'StatisticsController@pages');

    Route::get('/category/insert', 'Category@insert');

    Route::post('/category/store', 'Category@store');

    Route::get('/category/combo', 'Category@combo');

    Route::post('/category/delete', 'Category@destroy');

    Route::post('/category/update', 'Category@update');

    Route::get('/category/activity', 'StatisticsController@categories');
    
});



##ADMIN##