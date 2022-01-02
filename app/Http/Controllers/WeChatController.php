<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WeChatController extends Controller
{
    public function serve()
    {
        Log::info('request arrived.');

        // $work = \EasyWeChat::work();
        $app = app('wechat.work');

        Log::info(json_encode($app));
        // $work->server->push(function($message){
        //     return "欢迎关注 overtrue！";
        // });

        return $app->server->serve();
    }
}
