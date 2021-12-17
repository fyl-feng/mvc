<?php
/**
 * Created by PhpStorm.
 * User: fengyalei
 * Date: 2021/12/13
 * Time: 17:28
 */



define('DEBUG',true);
define('ROOT',__DIR__);
define('APP','app');

include "vendor/autoload.php";

if (DEBUG) {
    $whoops = new \Whoops\Run();
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
    $whoops->register();
    ini_set('display_errors','On');
}else{
    ini_set('display_errors','Off');
}
require __DIR__ . '/common/App.php';

spl_autoload_register('App::load');
App::run();