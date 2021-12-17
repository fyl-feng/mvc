<?php
/**
 * Created by PhpStorm.
 * User: fengyalei
 * Date: 2021/12/14
 * Time: 15:48
 */

namespace app\Model;


class TestModel extends \library\Model
{
    public $data = [];

    public function __construct(){
        parent::__construct();
    }

    public function getAll(){
        $sql = "SELECT * FROM test";
        return $this->data = $this->all($sql);
    }

    public function get($id){
        $sql = "SELECT * FROM test WHERE id={$id}";
        return $this->data = $this->first($sql);
    }
}