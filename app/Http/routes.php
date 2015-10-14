<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PagesController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('days/{id}', [
    'as' => 'showDay', 'uses' => 'PagesController@showDay'
]);

Route::resource('days.foodItems', 'foodItemsController');


// Route Model Binding

Route::model('days.foodItems', 'App\foodItem');

Route::bind('days.foodItems', 'App\foodItem');


