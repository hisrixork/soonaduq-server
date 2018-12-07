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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::get('/name/masjid/{lang}', 'ApiController@getMasjidName');
Route::post('/prayer/next/{t?}', 'ApiController@getNextPrayer');
Route::get('/prayers', 'ApiController@getPrayers');
Route::get('/times', 'ApiController@getAllTimes');
Route::get('/translate/{name}', 'ApiController@translateSalat')->name('translate.salat');
Route::get('/wait/{name}', 'ApiController@getWait')->name('get.wait');
Route::get('/hadith/{id}', 'ApiController@getHadith')->name('get.hadith');
Route::get('/coords', 'ApiController@getCoords')->name('get.coords');