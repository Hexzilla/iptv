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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/',                          'AuthController@index')->name('index');
Route::post('/checklogin',               'AuthController@checklogin')->name('checklogin');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/room',               'HomeController@room')->name('room');
    Route::post('/add_room',          'HomeController@add_room')->name('add_room');
    Route::get('/get_room',           'HomeController@get_room')->name('get_room');
    Route::post('/remove_room',       'HomeController@remove_room')->name('remove_room');

    Route::get('/category',            'HomeController@category')->name('category');
    Route::post('/add_category',       'HomeController@add_category')->name('add_category');
    Route::get('/get_category',        'HomeController@get_category')->name('get_category');
    Route::post('/remove_category',    'HomeController@remove_category')->name('remove_category');

    Route::get('/channel',            'HomeController@channel')->name('channel');
    Route::post('/add_channel',       'HomeController@add_channel')->name('add_channel');
    Route::get('/get_channel',        'HomeController@get_channel')->name('get_channel');
    Route::post('/remove_channel',     'HomeController@remove_channel')->name('remove_channel');

    Route::get('/device',               'HomeController@device')->name('device');
    Route::post('/add_device',         'HomeController@add_device')->name('add_device');
    Route::get('/get_device',          'HomeController@get_device')->name('get_device');
    Route::post('/remove_device',      'HomeController@remove_device')->name('remove_device');
});


//////////////////----------------Output Format--------------//////////////////
//m3u
Route::get('/tv/m3u',                   'FormatController@m3u');
Route::get('/tv/playlist/m3u',          'FormatController@m3u_playlist');

Route::get('/tv/channels.m3u',          'FormatController@m3u');
Route::get('/tv/playlist/channels.m3u', 'FormatController@m3u_playlist');

//xmlTV
Route::get('/tv/xml',                   'FormatController@xml');
Route::get('/tv/playlist/xml',          'FormatController@xml_playlist');
//Json
Route::get('/tv/json',                  'FormatController@json');
Route::get('/tv/playlist/json',         'FormatController@json_playlist');

Route::get('/tv/channels.json',         'FormatController@json');
Route::get('/tv/playlist/channels.json','FormatController@json_playlist');
//Mag
Route::get('/tv/mag',                   'FormatController@mag');
Route::get('/tv/playlist/mag',          'FormatController@mag');
