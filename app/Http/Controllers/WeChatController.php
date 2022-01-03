<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WeChatController extends Controller
{
    public function serve(Request $request)
    {
        Log::info($request->all());

        $app = app('wechat.work');

        // $app->server->push(function($message){
        //     return "欢迎关注 overtrue！";
        // });

        $app->server->addEventListener('enter_session', function($message, \Closure $next) {
            return '感谢您关注 EasyWeChat enter_session!';
        });

        Log::info($app->server->serve());
        return $app->server->serve();
        
    }
}
