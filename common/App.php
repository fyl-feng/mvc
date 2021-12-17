<?php
/**
 * Created by PhpStorm.
 * User: fengyalei
 * Date: 2021/12/14
 * Time: 17:07
 */

use library\Log;
use library\Route;

class App{

    public static $classMap = array();

    public static function run(){
        Log::init();
        $route = new Route();
        $ctrlClass = $route->controller;
        $action = $route->action;
        $ctrl =ROOT.'/app/Controller/'.$ctrlClass.'Controller.php';
        if (is_file($ctrl)){
            $class = '\\app\\Controller\\'.$ctrlClass.'Controller';
            include $ctrl;
            $cron = new $class();
            $cron->$action();
            Log::log('123');
        }else{
            throw new \Exception('未找到控制器'.$ctrl);
        }
    }

    public static function load($class) {
        // 自动加载类
        if (isset(self::$classMap[$class])){
            return true;
        }else{
            $class = str_replace('\\','/',$class);
            if (is_file( ROOT .'/'.$class.'.php')){
                include  ROOT .'/'.$class.'.php';
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }

    }
}