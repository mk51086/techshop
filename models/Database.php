<?php


class Database
{
    private static $db = null;
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
        $dsn = 'mysql:host=' . $this->getConfig('host') . ';dbname=' . $this->getConfig('database');

        $this->conn = null;

        try {
            $this->conn = new PDO($dsn, $this->getConfig('user'), $this->getConfig('password'));
            $this->conn->exec("set names utf8");
        } catch (PDOException $e) {
            print 'Lidhja me Databaze deshtoi: <br>' . $e->getMessage();
            die();
        }
        return $this->conn;
    }

    public function setConfig()
    {
        $this->config = include isset($_SERVER['REQUEST_URI']) ? __DIR__ . '/../config/db_info.php' : __DIR__ . '/config/db_info.php';
    }


    public function addUser($emri, $mbiemri, $password, $email, $gjinia)
    {
        $query = "INSERT INTO users(id,emri,mbiemri,password,email,gjinia) VALUES(NULL,?,?,?,?,?)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $emri, PDO::PARAM_STR);
        $stmt->bindParam(2, $mbiemri, PDO::PARAM_STR);
        $stmt->bindParam(3, $password, PDO::PARAM_STR);
        $stmt->bindParam(4, $email, PDO::PARAM_STR);
        $stmt->bindParam(5, $gjinia, PDO::PARAM_STR);
        return $stmt->execute();
    }

    /*	 public function addUserImg($emri, $mbiemri, $password, $email,$gjinia,$file)
        {
             $permited  = array('jpg','jpeg','png','gif');
             $file_name = $file['img']['name'];
             $file_temp = $file['img']['tmp_name'];

            $div = explode('.', $file_name);
             $file_ext = strtolower(end($div));
             $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
             $uploaded_image = "../admin/uploads/img/".$unique_image;
             move_uploaded_file($file_temp, $uploaded_image);
             $query = "INSERT INTO users (emri,mbiemri,password,email,gjinia,image) VALUES(?,?,?,?,?,?)";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $emri, PDO::PARAM_STR);
            $stmt->bindParam(2, $mbiemri, PDO::PARAM_STR);
            $stmt->bindParam(3, $password, PDO::PARAM_STR);
            $stmt->bindParam(4, $email, PDO::PARAM_STR);
            $stmt->bindParam(5, $gjinia, PDO::PARAM_STR);
            $stmt->bindParam(6, $uploaded_image, PDO::PARAM_STR);

            return $stmt->execute();
        }*/


//insert into mesazhet values (NULL,'test','asd@asd.com','hello there','+38344112332')
    public function addMsg($emri, $email, $msg, $tel)
    {
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

    public function totalMessages()
    {
        $query = "SELECT * FROM mesazhet";
        $stmt = $this->conn->query($query)->rowCount();
        return $stmt;
    }

    public static function instance()
    {
        if (Database::$db === null) {
            Database::$db = new Database();
        }
        return Database::$db;
    }

    public function delete($query)
    {
        $delete_row = $this->conn->query($query) or die();
        return $delete_row;
    }

    public function select($query)
    {
        $result = $this->conn->query($query) or die();
        return $result;
    }

}
