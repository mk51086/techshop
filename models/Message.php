<?php
include_once("Database.php");

class Message {
    public static $table_name= 'mesazhet';
    private $db;
    public $id;
    public  $emri;
    public $email;
    public $mesazhi;
    public $tel;

    public function __construct(){
        $this->db = new Database();
    }

    public function createMessages($row)
    {
        $mesazhet = new Message();
        $mesazhet->ID = $row['ID'];
        $mesazhet->emri = $row['emri'];
        $mesazhet->email = $row['email'];
        $mesazhet->mesazhi = $row['mesazhi'];
        $mesazhet->tel = $row['tel'];
   
        return $mesazhet;
    }
    public function getMessages($id)
    {
        $query = "SELECT * FROM " . Message::$table_name . " WHERE id = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $mesazhet = null;
        while ($row = $stmt->fetch()) {
           $mesazhet = $this->createMessages($row);
        }
        return $mesazhet;
    }
     public static function shortDesc($text)
    {
        if (strlen(substr($text, 0, 100)) <= 100) {
            return substr($text, 0, 50) . '...';
        } else {
            return $text;
        }
    }

    public function deleteMessages($id)
    {
        $mesazhet = $this->getMessages($id);
        $query = "DELETE FROM " . Message::$table_name . " WHERE ID = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }


    public function totalRowsM()
    {
        $query = "SELECT * FROM " . Message::$table_name;
        $stmt = $this->db->conn->query($query)->rowCount();
        return $stmt;
    }

    public function getAllMessages()
    {
        $query = "SELECT * FROM " . Message::$table_name;
        $stmt = $this->db->conn->query($query);
        $mesazhi = [];
        while ($row = $stmt->fetch()) {
            $mesazhi = $this->createMessages($row);
            $mesazhet[] = $mesazhi;
        }
        return $mesazhet;
    }




    public function getMessagesPage($v1,$v2){
        $query = "SELECT * FROM " . Message::$table_name . " ORDER BY emri DESC LIMIT ?,?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1, $v1, PDO::PARAM_INT);
        $stmt->bindParam(2, $v2, PDO::PARAM_INT);
        $stmt->execute();
        $mesazhet = [];
        while ($row = $stmt->fetch()) {
            $mesazhi = $this->createMessages($row);
            $mesazhet[]=$mesazhi;
        }
        return $mesazhet;
    }



}
