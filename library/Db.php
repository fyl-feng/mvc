<?php

/**
 * Created by PhpStorm.
 * User: fengyalei
 * Date: 2021/12/13
 * Time: 17:29
 */
namespace library;

class Db
{
    private $conn = null;
    private static $instance = null;
    public $insertId = null;
    public $nums = 0;
    private $config =[
        'db'=>'mysql','host'=>'mysql','port'=>'3306',
        'user'  =>  'root', 'pass' =>'root','charset'=>'utf8',
        'dbname'=>'test'
    ];

    private function __construct($params = []){
        $this->config = array_merge($this->config,$params);
        $this->connect();
    }
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }
    public static function getInstance(){
        if (!self::$instance instanceof self){
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function connect()
    {
        try {
            $dsn = "{$this->config['db']}:host={$this->config['host']};port={$this->config['port']};dbname={$this->config['dbname']};charset={$this->config['charset']}";
            $this->conn = new \PDO($dsn,$this->config['user'],$this->config['pass']);
            $this->conn->query("SET NAMES {$this->config['charset']}");
        }catch (\PDOException $e){
            die('数据库连接失败:'.$e->getMessage());
        }
    }

    // 写
    public function exec($sql){
        $num = $this->conn->exec($sql);
        if ($num >0){
            if ($this->conn->lastInsertId() !== null){
                $this->insertId = $this->conn->lastInsertId();
            }
            $this->nums = $num;
        }else{
            $error = $this->conn->errorInfo();
            print "操作失败:" .$error[0] .':' .$error[1] .":". $error[2];
        }
    }
    public function first($sql){
        return $this->conn->query($sql)->fetch(\PDO::FETCH_ASSOC);
    }
    public function all($sql){
        return $this->conn->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }
}