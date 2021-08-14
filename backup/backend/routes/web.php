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
    return redirect('login');
});

Route::get('dashboard', 'dashboardController@index');
Route::group(['middleware' => ['web']], function () {
    Route::resource('blog', 'blogController');
    Route::resource('carousel', 'carouselController');
    Route::resource('gallery', 'galleryController');
    Route::resource('page', 'pageController');
    Route::resource('teacher', 'teacherController');
    Route::resource('video', 'videoController');
});


// Route::get('api/showAllBlog', 'blogController@showAllBlog');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/api', function () {
    return view('api');
});