<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin');
    // 老师
    $router->resource('users', 'UserController');
    // 模块
    $router->resource('modules', 'ModuleController');
    // 小模块
    $router->resource('cubes', 'CubeController');
    // 环节
    $router->resource('links', 'LinkController');
    // 步骤
    $router->resource('steps', 'StepController');
    // 文档列表
    $router->resource('docs', 'DocController');
    // api modules
    $router->get('api/modules', 'ApiController@modules');
    // api cubes
    $router->get('api/cubes', 'ApiController@cubes');
    // api links
    $router->get('api/links', 'ApiController@links');
    // api links
    $router->get('api/tabs', 'ApiController@tabs');
    // 首页
    $router->resource('home_pages', 'HomePageController');
    // 模块页
    $router->resource('menu_pages', 'MenuPageController');
    // 大模块
    $router->resource('module_menus', 'ModuleMenuController');
    // tab
    $router->resource('tabs', 'TabController');
    // 主题
    $router->resource('themes', 'ThemeController');
    // 标签
    $router->resource('tags', 'TagController');
    // 知识库
    $router->resource('knowledge', 'KnowledgeController');
    // 设置
    $router->resource('settings', 'SettingController');
    // 问题标签
    $router->resource('qtags', 'QTagController');
    // 模块下的tabs
    $router->resource('module_menu_tabs', 'ModuleMenuTabController');
    // 模块tab
    $router->resource('module_tab', 'ModuleTabController');

});
