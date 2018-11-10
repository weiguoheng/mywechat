php artisan migrate     创建数据库，确保数据库已存在，读取database目录下的migrations来创建数据库

如果报错：SQLSTATE[42000]: Syntax error or access violation:1071 Specified key was t
oo long; max key length is 767 bytes (SQL: alter table `users` add unique `
users_email_unique`(`email`))

在app/Providers/AppServiceProvider.php
boot方法下新增：Schema::defaultStringLength(191);

-----------------------------------------------------------------------------------------------
php artisan make:auth   创建用户系统，views会新增模板，路由会多一个home路由

php artisan migrate:rollback --step=1    回滚数据库操作，migrations记录log

php artisan migrate:reset   删除所有操作，清空数据表

php artisan migrate:refresh   清空所有指令，再次执行php artisan migrate

php artisan make:migration create_books_table --create=books    创建数据库执行文件，文件名create_books_table，数据库名books

php artisan make:migration add_author_field_into_books_table --table=books     创建更新数据库的文件

php artisan make:command commandName    创建脚本
新建脚本后，在  protected $signature = 'command:wechat' 定义执行脚本的名称
php artisan command:commandName     执行脚本

php artisan make:seeder UserTableSeeder 创建seeder
在seeder中编写要写入的数据库内容
php artisan db:seed         执行文件seeder操作

php artisan migrate:refresh --seed      清空数据库，执行seeder操作
