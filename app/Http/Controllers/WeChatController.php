<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WeChatController extends Controller
{
    public function serve(Request $request)
    {
        Log::info($request->all());

        // $work = \EasyWeChat::work();
        $app = app('wechat.work');

        // $app->server->push(function($message){
        //     return "欢迎关注 overtrue！";
        // });

        Log::info($app->server->serve());
        return $app->server->serve();
        
    }
}
