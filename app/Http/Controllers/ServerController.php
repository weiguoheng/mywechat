<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use EasyWeChat\Factory;
use EasyWeChat\Kernel\Messages\Text;
class ServerController
{
	private $app;
	function __construct(){
        $config = DB::table('wechat_config')->where(array('appid'=>'wxe73a7444c2c229e6'))->first();
        $config = get_object_vars($config);
		$this->app = Factory::officialAccount($config);
	}
	public function index(){
        $app = $this->app;
		$app->server->push(function ($message) {
		    return "您好！欢迎使用 EasyWeChat";
		});
		$response = $app->server->serve();
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
