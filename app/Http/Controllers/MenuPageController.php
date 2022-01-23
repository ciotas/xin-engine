<?php

namespace App\Http\Controllers;

use App\Models\MenuPage;
use App\Models\Theme;
use Illuminate\Http\Request;

class MenuPageController extends Controller
{
    public function index($hid = 0)
    {
        $menu_page = MenuPage::first();
        
        if ($menu_page) {
            $menu_page->banner = $menu_page->getBanner();
            $menu_page->image = $menu_page->getimage();
            // 主题
            $themes = Theme::with(['module_menus' => function($query) {
                return $query->orderBy('order_no');
            }])->where('hid', $hid)->get()
            ->map(function ($item, $key) {
                foreach($item->module_menus as $module_menu)
                {
                    $module_menu->cover = $module_menu->getCover();
                    $module_menu->bg_img = $module_menu->getBgImg();
                    $module_menu->dot_img = $module_menu->getDotImg();
                    $module_menu->tags_img = $module_menu->getTagsImg();
                    $module_menu->video_cover = $module_menu->getVideoCover();
                    $module_menu->video_url = $module_menu->getVideoUrl();
                    
                }
                return $item;
            });
        }
        
        $data = [
            'menu_page' => $menu_page,
            'themes' => $themes
        ];
        
        return response()->json([
            'code' => 200,
            'msg' => 'success',
            'data' => $data
        ]);

    }

}
