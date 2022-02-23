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
        } catch (PDOException $e) {
            print 'Lidhja me Databaze deshtoi: <br>'.$e->getMessage();
            die();
        }
        return $this->conn;
    }

    public function setConfig()
    {
        $this->config = include isset($_SERVER['REQUEST_URI']) ? __DIR__.'/../config/db_info.php' : __DIR__.'/config/db_info.php';
    }



    public function addUser($emri, $mbiemri, $password, $email)
    {
        $query = "INSERT INTO users VALUES(NULL,?,?,?,?)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->bindParam(2, $password, PDO::PARAM_STR);
        $stmt->bindParam(3, $emri, PDO::PARAM_STR);
        $stmt->bindParam(4, $mbiemri, PDO::PARAM_STR);
        return $stmt->execute();
    }
//insert into mesazhet values (NULL,'test','asd@asd.com','hello there','+38344112332')
    public function addMsg($emri,$email,$msg,$tel){
        $query = "INSERT INTO mesazhet VALUES(NULL,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $emri, PDO::PARAM_STR);
        $stmt->bindParam(2, $email, PDO::PARAM_STR);
        $stmt->bindParam(3, $msg, PDO::PARAM_STR);
        $stmt->bindParam(4, $tel, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function isUserEmailExists($email)
    {
        $query = "SELECT email FROM " . User::$table_name . " WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }


}
