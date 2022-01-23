<?php

namespace App\Http\Controllers;

use App\Models\ModuleTab;
use Illuminate\Http\Request;

class ModuleTabController extends Controller
{
    public function index()
    {
        $tabs = ModuleTab::all()->map(function($item, $key) {
            $item->video_cover = $item->getVideoCover();
            $item->video_url = $item->getVideoUrl();
            return $item;
        });
        return response()->json([
            'code' => 200,
            'msg'=> 'success',
            'data' => $tabs
        ]);
    }
}
