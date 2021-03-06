<?php

use App\Organization;
use Illuminate\Http\Request;
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

Route::get('/'                             , 'TestController@index');
Route::get('/{shortname}'                  , 'TestController@index');
Route::post('/results'                     , 'ResultController@post');
Route::get('/{shortname}/results'          , 'ResultController@index');

Route::post('/send'                        , 'SendResultController@post');
