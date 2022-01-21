<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        if ($setting) {
            $setting->huoban_logo =  $setting->getHuobanLogo();
            $setting->share_img =  $setting->getShareImg();
            $setting->contact_img =  $setting->getContactImg();
            $setting->huoban_poster =  $setting->getHuobanPoster();
        }
        
        return response()->json([
            'code' => 200,
            'msg' => 'success',
            'data' => $setting
        ]);
    }
}
