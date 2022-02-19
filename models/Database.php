<?php


class Database
{	
    public $conn;
	protected $config;

    public function __construct()
    {
        $this->setConfig();
        return $this->getPDOConnection();
    }

 public function getConfig($config)
    {
        return $this->config[$config];
    }

   public function getPDOConnection()
    {
        $dsn = 'mysql:host='.$this->getConfig('host').';dbname='.$this->getConfig('database');

		 $this->conn = null;

        try {
            $this->conn = new PDO($dsn, $this->getConfig('user'), $this->getConfig('password'));
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
             print 'Lidhja me Databaze deshtoi: <br>'.$e->getMessage();
            die();
        }
    }

  public function setConfig()
    {
        $this->config = include isset($_SERVER['REQUEST_URI']) ? __DIR__.'/../config/db_info.php' : __DIR__.'/config/db_info.php';
    }

}
