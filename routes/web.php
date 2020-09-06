<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Mail\ContactUs;
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

Auth::routes();

// home
Route::get('/home', 'HomeController@index')
    ->name('home')
    ->middleware('throttle:360,1');

// welcome
Route::get('/', 'WelcomeController')
    ->name('index.page')
    ->middleware('throttle:360,1');

// about us
Route::get('/about-us/{lang}', 'AboutUsController')
    ->name('aboutus')
    ->middleware('throttle:360,1')
    ->where('lang', '[a-z]{2}');

// contact us
Route::get('/contact-us/{lang}', 'ContactUsController')
    ->name('contactus')
    ->middleware('throttle:360,1')
    ->where('lang', '[a-z]{2}');;

Route::post('/send/email', 'SendEmailContrller@send')
    ->name('sending.email')->middleware('throttle:360,1');

// our services
Route::get('/our-services/{lang}', 'OurServicesController')
    ->name('ourservices.index')
    ->middleware('throttle:360,1')
    ->where('lang', '[a-z]{2}');

// posts
Route::get('/posts/{lang}', 'PostController@index')
    ->name('posts.index')
    ->where('lang', '[a-z]{2}');

Route::get('/posts/create/{lang}', 'PostController@create')
    ->name('posts.create')
    ->where('lang', '[a-z]{2}');

Route::get('/posts/{id}/{lang}', 'PostController@show')
    ->name('posts.show')
    ->where(['id' => '[0-9]+', 'lang' => '[a-z]{2}']);

Route::get('/posts/edit/{id}/{lang}', 'PostController@edit')
    ->name('posts.edit')
    ->where(['id' => '[0-9]+', 'lang' => '[a-z]{2}']);

Route::post('/posts/store/{lang}', 'PostController@store')
    ->name('posts.store')
    ->where('lang', '[a-z]{2}');

Route::put('/posts/update/{id}/{lang}', 'PostController@update')
    ->name('posts.update')
    ->where(['id' => '[0-9]+', 'lang' => '[a-z]{2}']);

Route::delete('/posts/delete/{id}/{lang}', 'PostController@destroy')
    ->name('posts.delete')
    ->where(['id' => '[0-9]+', 'lang' => '[0-z]{2}']);

// teams
Route::get('/teams/{lang}', 'TeamController@index')
    ->name('teams.index')
    ->where('lang', '[a-z]{2}');

Route::get('/teams/create/{lang}', 'TeamController@create')
    ->name('teams.create')
    ->where('lang', '[a-z]{2}');

Route::get('/teams/edit/{id}/{lang}', 'TeamController@edit')
    ->name('teams.edit')
    ->where(['id' => '[0-9]+', 'lang' => '[a-z]{2}']);

Route::post('/teams/store/{lang}', 'TeamController@store')
    ->name('teams.store')
    ->where('lang', '[a-z]{2}');

Route::put('/teams/update/{id}/{lang}', 'TeamController@update')
    ->name('teams.update')
    ->where(['id' => '[0-9]+', 'lang' => '[a-z]{2}']);

Route::delete('/teams/delete/{id}/{lang}', 'TeamController@destroy')
    ->name('teams.delete')
    ->where(['id' => '[0-9]+', 'lang' => '[a-z]{2}']);

// comments
Route::post('/comments/store/{post_id}/{lang}', 'CommentController@store')
    ->name('comments.store')
    ->middleware('throttle:360,1')
    ->where(['post_id' => '[0-9]+', 'lang' => '[a-z]{2}']);

//setLocale
Route::post('setLocale', 'SetLocaleController')
    ->name('setLocale')
    ->middleware('throttle:360,1');
