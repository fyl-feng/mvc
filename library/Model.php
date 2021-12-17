<?php
/**
 * Created by PhpStorm.
 * User: fengyalei
 * Date: 2021/12/16
 * Time: 14:38
 */

namespace library;

use Medoo\Medoo;

class Model extends Medoo {

    protected $config =array();

    public function __construct() {
        $this->config = Conf::get('mysql','databases');
//        try {
//            $dsn = "{$this->config['db']}:host={$this->config['host']};port={$this->config['port']};dbname={$this->config['dbname']};charset={$this->config['charset']}";
//            $this->conn = new \PDO($dsn,$this->config['user'],$this->config['pass']);
//        }catch (\PDOException $e){
//            die('数据库连接失败:'.$e->getMessage());
//        }

        parent::__construct($this->config);
    }
}