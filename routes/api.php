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
Route::post('signup','API\SignupController@signup');
Route::post('login','API\SignupController@login');
Route::post('bookmark','API\Bookmarkcontroller@user_bookmark');

Route::post('record','API\recordController@store');
