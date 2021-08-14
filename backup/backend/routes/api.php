<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('carousel', 'API\carouselController@getCarausel');
Route::get('getBlog', 'API\blogController@getBlog');
Route::get('getBlogRandom', 'API\blogController@getBlogRandom');
Route::get('getTeacher', 'API\teacherController@getTeacher');
Route::get('getGallery', 'API\galleryController@getGallery');
Route::get('getSejarah', 'API\pageController@getPageSejarah');
Route::get('getVisiMisi', 'API\pageController@getPageVisiMisi');
Route::get('getKurikulum', 'API\pageController@getPageKurikulum');