<?php
/**
 * Created by PhpStorm.
 * User: fengyalei
 * Date: 2021/12/14
 * Time: 17:09
 */

namespace library;

class Route {

    public $controller = 'Controller.php';
    public $action = 'index';

    public function __construct(){
        $url = $_SERVER['REQUEST_URI'];

        $paths = array_filter(explode("/", trim($url,'/')));
        $controllerName = '';
        $methodName = 'index';
        if (!empty($paths)){
            $controllerName = isset($paths[0]) && !empty($paths[0]) ? $paths[0] : $controllerName;
            $methodName = isset($paths[1]) && !empty($paths[1]) ? $paths[1] : $methodName;
        }
        if (count($paths) > 2){
            $count = count($paths);
            $i=2;
            while ($i<$count){
                if (isset($paths[$i+1])){
                    $_GET[$paths[$i]] =  $paths[$i+1];
                }
                $i += 2;
            }
            var_dump($_GET);
        }
        $this->controller = $controllerName;
        $this->action = $methodName;
    }

}