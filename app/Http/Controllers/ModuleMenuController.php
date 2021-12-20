<?php

namespace App\Http\Controllers;

use App\Models\ModuleMenu;
use Illuminate\Http\Request;

class ModuleMenuController extends Controller
{
    public function index(Request $request) 
    {
        $module_menu_id = $request->module_menu_id;
        $module_menu = ModuleMenu::with('tabs')->where('id', $module_menu_id)->first();
        if ($module_menu) {
            $module_menu->cover = $module_menu->getCover();
            $module_menu->bg_img = $module_menu->getBgImg();
            $module_menu->dot_img = $module_menu->getDotImg();
            $module_menu->tags_img = $module_menu->getTagsImg();
            $module_menu->video_cover = $module_menu->getVideoCover();
            $module_menu->video_url = $module_menu->getVideoUrl();
    
            $module_menu->tabs->map(function($item, $key) {
                $item->prictice_video_cover = $item->getPricticeVideoCover();
                $item->prictice_video_url = $item->getPricticeVideoUrl();
                $item->cards = $item->getCards();
                $item->features = array_merge([0=>['title'=> $item->title, 'desc' => $item->brief]], $item->features);
            });
        }

        return response()->json([
            'code' => 200,
            'msg' => 'success',
            'data' => $module_menu
        ]);

    }
}
