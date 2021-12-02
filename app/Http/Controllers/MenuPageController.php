<?php

namespace App\Http\Controllers;

use App\Models\MenuPage;
use Illuminate\Http\Request;

class MenuPageController extends Controller
{
    public function index(Request $request)
    {
        $menu_page = MenuPage::first();
        $menu_page->banner = $menu_page->getBanner();
        $menu_page->video_cover = $menu_page->getVideoCover();
        $menu_page->image = $menu_page->getimage();
        return response()->json($menu_page);
    }

}
