<?php
/**
 * Created by PhpStorm.
 * User: fengyalei
 * Date: 2021/12/16
 * Time: 15:25
 */

namespace library;

class Conf {
    public static $data = array();
    public static $allData = array();
    public static function get($name,$file){
        if (isset(self::$data[$file][$name])){
            return self::$data[$file][$name];
        }else{
            $path = ROOT .'/config/'.$file.'.php';
            if (is_file($path)){
                $conf = include($path);
                if (isset($conf[$name])){
                    self::$data[$file][$name] = $conf[$name];
                    return $conf[$name];
                }else{
                    throw new \Exception('配置项不存在:'.$name);
                }
            }else{
                throw new \Exception('配置文件不存在:'.$file);
            }
        }
    }

    public static function all($file) {
        if (isset(self::$allData[$file])){
            return self::$allData[$file];
        }else{
            $path = ROOT .'/config/'.$file.'.php';
            if (is_file($path)){
                $conf = include($path);
                self::$allData[$file] = $conf;
                return $conf;
            }else{
                throw new \Exception('配置文件不存在:'.$file);
            }
        }
    }
}