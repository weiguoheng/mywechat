<?php
namespace App\Http\Controllers;

use EasyWeChat\Factory;
use EasyWeChat\Kernel\Messages\Text;
class ServerController
{
	private $app;
	function __construct(){
		// return 'success';
		// $config = [
		//     'app_id' => 'wxe73a7444c2c229e6',
		//     'secret' => '98cfe4d16b741874d87ec58d7d4a7717',
		//     'token'	 => 'heng',
		//     // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
		//     'response_type' => 'array',

		//     //...
		// ];
		// $this->app = Factory::officialAccount($config);
	}
	public function index(){
		$config = [
	    'app_id' => 'wxe73a7444c2c229e6',
	    'secret' => '98cfe4d16b741874d87ec58d7d4a7717',
	    'token'	 => 'heng',
	    // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
	    'response_type' => 'array',

	    //...
		];
		$app = Factory::officialAccount($config);
		$app->server->push(function ($message) {
		    // $message['FromUserName'] // 用户的 openid
		    // $message['MsgType'] // 消息类型：event, text....
		    return "您好！欢迎使用 EasyWeChat";
		});
		$response = $app->server->serve();
		file_put_contents('1.txt',json_encode($response));
		if(isset($_GET['echostr'])){
			// 将响应输出
			return $response;//return $response;
		}else{
			return '';//$this->responseMsg();
		}
	}
	public function responseMsg()
	{
		// echo('success');
		$app = $this->app;file_put_contents('hello.txt','zhelishihello');

		$app->server->push(function ($message) {
		    return "您好！欢迎使用 EasyWeChat!";
		});
		$response = $app->server->serve();

		// 将响应输出
		return $response;//return $response;
	}
	
	public function resText(){
		$app = $this->app;
		$app->server->push(function ($message) {
		    return new Text('您好！overtrue。');
		});
		$response = $app->server->serve();
		return $response;
		// $text = new Text();
		// $text->setAttribute('content', '您好！overtrue。');

	}
}
