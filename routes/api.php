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

Route::prefix('v1')
->name('api.v1.')
->group(function() {
    Route::group(['middleware'=> 'auth:sanctum'], function() {
        // 登录可以访问
        // 判断是否登录
        Route::get('islogin', 'WeChatController@isLogin');
    });
    Route::group([], function() {
        // 游客可以访问
        // 一级页面
        Route::get('home-pages', 'HomePageController@index')->name('home-pages');
        // 二级页面
        Route::get('menu-pages/{hid?}', 'MenuPageController@index')->name('menu-pages');
        // 三级页面
        Route::get('module-menu/{module_menu_id}', 'ModuleMenuController@index')->name('module-menu');
        // setting
        Route::get('setting', 'SettingController@index');
       
        // 提交问题
        Route::post('question', 'QuestionController@postQuestion');
        // 问题标签
        Route::get('qtags', 'QTagController@index');
        // 微信授权登陆
        Route::group(['middleware' => ['wechat.oauth']], function () {
            // 小程序授权登陆
        // Route::any('miniprogram/socials/authorizations', 'WeChatController@minProgramSocialStore');
        });
        Route::any('miniprogram/socials/authorizations', 'WeChatController@minProgramSocialStore');

        
        // jssdk
        Route::get('jssdk/config', 'WechatController@jssdkconfig');
        
        // 退出登录
        Route::get('user/delete', 'WeChatController@delete');
        // 获取模块名列表
        Route::get('menu_tabs', 'ModuleTabController@index');
    });
});