<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\WeappAuthorizationRequest;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WeChatController extends Controller
{
    public function serve(Request $request)
    {
        Log::info($request->all());
        return;

        $app = app('wechat.work');

        // $app->server->push(function($message){
        //     return "欢迎关注 overtrue！";
        // });

        return $app->kf->event([

        ]);
        

        // Log::info($app->server->serve());
        // return $app->server->serve();

    }

    public function server()
    {
        $app = app('wechat.official_account');
        $app->server->push(function($message){
            return "欢迎关注 overtrue！";
        });

        return $app->server->serve();
    }

    public function jssdkconfig(Request $request)
    {
        $arr = explode(',', $request->jsapis);
        $url = $request->url; // 当前网页的URL，不包含#及其后面部分
        $app = app('wechat.official_account');
        $app->jssdk->setUrl($url);
        $config = $app->jssdk->buildConfig($arr, false);
        return response($config);
    }

    public function isLogin(Request $request)
    {
        return response()->json([
            'code'=> 200,
            'msg' => 'success'
        ]);
    }

    public function minProgramSocialStore(Request $request)
    {
        // $miniProgram = \EasyWeChat::miniProgram();
        // $res = $miniProgram->PhoneNumber->getUserPhoneNumber($request->code);
        // Log::info(json_encode($res));
        // return response()->json($res);
        try {
            $iv = $request->iv;
            $encryptedData = $request->encryptedData;
            $miniProgram = \EasyWeChat::miniProgram();
            $session   = $miniProgram->auth->session($request->code);
            Log::info(json_encode($session));
            $session_key = $session['session_key'];
            
            $userInfo = $miniProgram->encryptor->decryptData($session_key, $iv, $encryptedData);
            Log::info(json_encode($userInfo));
            if ($userInfo) {
                // 查找是否注册
                $mobile = $userInfo['purePhoneNumber'];
                $user = User::where('mobile', $mobile)->first();
                if (!$user) {
                    $user = User::create([
                        'mobile' => $mobile,
                        'name' => '',
                        'weapp_openid' => $session['openid']
                    ]);
                    $token = $user->createToken('xteam-engine')->plainTextToken;
                    $response = [
                        'code' => 200,
                        'msg'=> 'success',
                        'data' => [
                            'user' => $user,
                            'token' => $token
                        ]
                    ];
                    return response($response, 201);

                } else {
                    // 用户已注册, 直接登陆
                    $user->weapp_openid = $session['openid'];
                    $user->save();
                    $token = $user->createToken('xteam-engine')->plainTextToken;
                    $response = [
                        'code' => 200,
                        'msg'=> 'success',
                        'data' => [
                            'user' => $user,
                            'token' => $token
                        ]
                    ];
                    return response($response, 201);

                }
            }
        } catch (\Exception $e) {
            Log::error('获取小程序数据'.$e->getMessage());
        }
    }
}
