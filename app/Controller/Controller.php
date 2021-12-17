<?php
/**
 * Created by PhpStorm.
 * User: fengyalei
 * Date: 2021/12/14
 * Time: 15:58
 */

namespace app\Controller;


use app\Model\TestModel;
use library\Model;
use library\View;

class Controller extends View{

    public function index(){

//        $mo = new Model();
//        $mo = $mo->select('test','*');
//        dd($mo);
        $this->view('index',['title'=>'自制框架','text'=>'欢迎使用']);
    }
}