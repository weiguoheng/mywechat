<?php
require __DIR__.'/../vendor/autoload.php';

use EasyWeChat\Factory;
use EasyWeChat\Kernel\Messages\Text;

class Server{
	function __construct(){
		$config = [
	    'app_id' => 'wxe73a7444c2c229e6',
	    'secret' => '98cfe4d16b741874d87ec58d7d4a7717',
	    'token'	 => 'heng',
	    // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
	    'response_type' => 'array',

	    //...
		];
		$app = Factory::officialAccount($config);
		$response = $app->server->serve();
		file_put_contents('2.txt',json_encode($response));
		if(isset($_GET['echostr'])){
			// 将响应输出
			return $response;//return $response;
		}else{
			return '';//$this->responseMsg();
		}
	}
}

new Server;