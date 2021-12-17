<?php
/**
 * Created by PhpStorm.
 * User: fengyalei
 * Date: 2021/12/16
 * Time: 16:30
 */

namespace library\drive\log;

use library\Conf;

class file {

    public $path;

    public function __construct(){
        $this->path = ROOT.Conf::get('path','log');
    }

    public function log($mess){
        if (!is_dir($this->path)){
            mkdir($this->path . '0777', true);
        }
        $data = [
            'time'  =>  date('Y-m-d H:i:s'),
            'message' => $mess
        ];
        return file_put_contents($this->path.'/log.log',json_encode($data,JSON_UNESCAPED_UNICODE).PHP_EOL,FILE_APPEND);
    }
}