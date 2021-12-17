<?php
/**
 * Created by PhpStorm.
 * User: fengyalei
 * Date: 2021/12/16
 * Time: 16:19
 */

namespace library;

use library\drive\log\file;

class Log {

    public static $class;

    public static function init() {
        $drive = \library\Conf::get('drive','log');
        $class = ROOT.'/library/drive/log/'.$drive;
        self::$class = new file();
    }

    public static function log($message) {
        self::$class->log($message);
    }
}