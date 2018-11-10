<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::any('/server', 'ServerController@index');
// Route::post('/server', function(){
//   file_put_contents('33333.txt','3333');
// });

Route::any('/response', 'ServerController@response');

Route::any('/responseMsg', 'ServerController@responseMsg');

Route::any('/resText', 'ServerController@resText');

Route::get('/site', 'SiteController@index');

Route::get('/about', function () {
    return view('about');
});

Route::get('book/{id}', function ($id) {
    return $id;
})->where('id','[1-9]+');

Route::patch('books', function () {
    return '09';
});

Route::prefix('user')->group(function(){
   Route::get('email', function(){
       return '邮箱';
   });
   Route::get('avater', function(){
       return '头像';
   });
});
// 在view/users/index.blade.php模板传送单一变量
Route::get('/user/index', function () {
    return view('users.index')->with(['websits'=>'user-index']);
});
// 在view/users/set.blade.php模板传送多个变量 方式一
// Route::get('/user/set', function () {
//     return view('users.set',[
//     	'websits' => 'user-set',
//     	'name' => 'www'
//     ]);
// });
// 在view/users/set.blade.php模板传送多个变量 方式二
Route::get('/user/set', function () {
	$website = 'baidu';
	$name = 'www';
    return view('users.set',compact('website','name'));
});
// 带样式输出
Route::get('/article/index', function () {
	$title = '<div style="color:red;">带样式输出</div>';
	$name = 'www';
    return view('article.index',compact('title','name'));
});
// 模块化
Route::get('/article/detail', function () {
  $title = '<div style="color:red;">带样式输出</div>';
  $name = 'www';
    return view('article.detail',compact('title','name'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
