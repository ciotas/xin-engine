<?php

namespace App\Http\Controllers;

use Exception;
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

    public function minProgramSocialStore(Request $request)
    {
        Log::info('--------start minProgramSocialStore--------');
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
                    return $this->storeUser($mobile, null , null, $session['openid']);
                } else {
                    // 用户已注册, 直接登陆
                    $user->open_id = $session['openid'];
                    $user->save();
                    try {
                        $response = $this->getPassportToken($user)->getOriginalContent();
                        $res = json_decode((string) $response);
                        return response()->json([
                            'code' => 1000,
                            'user_id' => $user->id,
                            'openid' => $user->open_id,
                            'token_type' => $res->token_type,
                            'expires_in' => $res->expires_in,
                            'access_token' => $res->access_token,
                            'refresh_token' => $res->refresh_token,
                        ]);
                    } catch(Exception $e) {
                        Log::error('验证验证码，获取token错误：'.$e->getMessage());
                        throw new Exception($e->getMessage());
                    }
                }
            }
        } catch (\Exception $e) {
            Log::error('获取小程序数据'.$e->getMessage());
        }
    }
}
