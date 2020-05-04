<?php

use Illuminate\Support\Facades\Route;
use App\Followable;
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

Route::middleware('auth')->group(function(){
    
    Route::get('/questions', 'QuestionController@index')->name('questions');
    Route::post('/questions', 'QuestionController@store');

    Route::post('/profiles/{user}/follow', 'FollowsController@store');
   
    Route::get('/profiles/{user}/edit', 'ProfilesController@edit');

});

Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');

Route::get('/welcome', 'QuestionController@index');



Auth::routes();
