<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')
->name('api.v1.')
->group(function() {
    Route::middleware('auth:sanctum')->group(function() {
        // 登录可以访问
    });
    Route::group([], function() {
        // 游客可以访问
        // 一级页面
        Route::get('home-pages', 'HomePageController@index')->name('home-pages');
        Route::get('menu-pages', 'MenuPageController@index')->name('menu-pages');

    });
});