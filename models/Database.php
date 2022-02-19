<?php


class Database
{	
    public $conn;
	protected $config;
private static $db = null;
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
        } catch (PDOException $e) {
             print 'Lidhja me Databaze deshtoi: <br>'.$e->getMessage();
            die();
        }
    }

  public function setConfig()
    {
        $this->config = include isset($_SERVER['REQUEST_URI']) ? __DIR__.'/../config/db_info.php' : __DIR__.'/config/db_info.php';
    }

  public static function instance()
    {
        if (Database::$db === null) {
            Database::$db = new Database();
        }
        return Database::$db;
    }


    public function addUser($emri, $mbiemri, $password, $email)
    {
        $query = "INSERT INTO " . User::$table_name . "(email, password, emri, `mbiemri`) VALUES(?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(2, $emri, PDO::PARAM_STR);
        $stmt->bindParam(3, $mbiemri, PDO::PARAM_STR);
        $stmt->bindParam(4, $password, PDO::PARAM_STR);
        $stmt->bindParam(5, $email, PDO::PARAM_STR);
        return $stmt->execute();
    }



}
