<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function() {
    return redirect()->route('dcat.admin.admin');
});
Route::get('/knowledge/{knowledge_id}', 'KnowledgeController@show')->name('knowledge.show');
// 微信客服回调url
Route::any('wechat', 'WeChatController@serve');
// 微信公众号回调url
Route::any('wechat/server', 'WeChatController@server');

Route::any('wechat/test', 'WeChatController@test');
Route::any('wechat/kf', 'WeChatController@kf');