<?php

// 引入自动加载文件
require __DIR__ . '/../vendor/autoload.php';

// 实例化容器，注册路由，事件组件
$app = new Illuminate\Container\Container();
with(new Illuminate\Routing\RoutingServiceProvider($app))->register();
with(new Illuminate\Events\EventServiceProvider($app))->register();

// 引入路由
require __DIR__ . '/../routes/web.php';

// 引入 Eloquent ORM
$manager = new Illuminate\Database\Capsule\Manager();
$manager->addConnection(require __DIR__.'/../config/database.php');
$manager->bootEloquent();

// 引入 view
Illuminate\Container\Container::setInstance($app);
$app->instance('config', new \Illuminate\Support\Fluent());
$app['config']['view.compiled'] = "/data/app/project/storage/framework";
$app['config']['view.paths'] = ["/data/app/project/resources/views"];
with(new Illuminate\View\ViewServiceProvider($app))->register();
with(new Illuminate\Filesystem\FilesystemServiceProvider($app))->register();

// 处理 http 请求
$request = Illuminate\Http\Request::createFromGlobals();
$response = $app['router']->dispatch($request);

// 返回
$response->send();
