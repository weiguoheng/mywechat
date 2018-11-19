<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use EasyWeChat\Factory;
class ServerController
{
	private $app;
	function __construct(){
        $config = DB::table('wechat_config')->where(array('id'=>'1'))->first();
        $config = get_object_vars($config);
		$this->app = Factory::officialAccount($config);
	}
	public function index(){
        $app = $this->app;
		if(isset($_GET['echostr'])){
            $app->server->push(function ($message) {
                return "您好！欢迎使用 EasyWeChat";
            });
            $response = $app->server->serve();
			// 将响应输出
			return $response;//return $response;
		}else{
            $response = $this->responseMsg();
            return $response;
		}
	}
	public function responseMsg()
	{
		$app = $this->app;
        $app->server->push(function ($message) {
            switch ($message['MsgType']) {
                case 'event':
                    return '收到事件消息';
                    break;
                case 'text':
                    return '收到文字消息';
                    break;
                case 'image':
                    return '收到图片消息';
                    break;
                case 'voice':
                    return '收到语音消息';
                    break;
                case 'video':
                    return '收到视频消息';
                    break;
                case 'location':
                    return '收到坐标消息';
                    break;
                case 'link':
                    return '收到链接消息';
                    break;
                case 'file':
                    return '收到文件消息';
                // ... 其它消息
                default:
                    return '收到其它消息';
                    break;
            }
        });
        $response = $app->server->serve();
		// 将响应输出
		return $response;
	}
	protected function getToken(){
	    $app = $this->app;
        $accessToken = $app->access_token;
        $token = $accessToken->getToken();
        return $token;
    }
}
