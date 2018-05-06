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
    return view('salam');
});
Route::get('/ayoub', function () {
    return view('ayoub');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/Tasjil_elyawm', 'Tasjil_elyawmController@Tasjil_elyawm')->middleware('auth');
Route::post('/Tasjil_elyawm', 'Tasjil_elyawmController@Tasjil_elyawm')->middleware('auth');

Route::get('/ta7akoum', 'Ta7akoumController@ta7akoum')->middleware('auth');
Route::post('/ta7akoum', 'Ta7akoumController@ta7akoum')->middleware('auth');

Route::get('/last_month/{l_m}/{l_y}', 'PaginationController@last_month')->middleware('auth');
Route::get('/next_month/{n_m}/{n_y}', 'PaginationController@next_month')->middleware('auth');

Route::get('/show_tasjil/{y}/{m}/{d}', 'Show_tasjilController@show_tasjil')->middleware('auth');

Route::get('/delete_wajib/{id}', 'Ta7akoumController@delete_wajib')->middleware('auth');

Route::get('/jadwal_ousbou3i', 'Jadwal_ousbou3iController@jadwal_ousbou3i')->middleware('auth');

Route::get('/last_week/{l_d}/{l_m}/{l_y}', 'PaginationController@last_week')->middleware('auth');
Route::get('/next_week/{n_d}/{n_m}/{n_y}', 'PaginationController@next_week')->middleware('auth');

Route::get('/update/{id}', 'UpdateController@update')->middleware('auth');
Route::post('/update/{id}', 'UpdateController@update')->middleware('auth');

Route::get('/note/{id}', 'NoteController@note')->middleware('auth');

Route::get('/traduction', 'TraductionController@traduction')->middleware('auth');
Route::post('/traduction', 'TraductionController@traduction')->middleware('auth');

Route::get('/update_traduction/{id}', 'TraductionController@update_traduction')->middleware('auth');
Route::post('/update_traduction/{id}', 'TraductionController@update_traduction')->middleware('auth');

Route::get('/tamache9', 'Tamache9Controller@tamache9')->middleware('auth');
Route::post('/tamache9', 'Tamache9Controller@tamache9')->middleware('auth');

Route::get('/tasjil_yawm_madi/{id}', 'Tasjil_yawm_madiController@tasjil_yawm_madi')->middleware('auth');
Route::post('/tasjil_yawm_madi/{id}', 'Tasjil_yawm_madiController@tasjil_yawm_madi')->middleware('auth');