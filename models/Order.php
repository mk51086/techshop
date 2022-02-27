<?php
class Order{
    public static $table_name = 'orders';
    private $db;
    public $id;
    public $address;
    public $p_id;
    public $u_id;
    private static $notifications = [];
    public $product;
    public $price;
    public function __construct ()
    {
        $this->db=new Database();
    }

    public function addOrder($p_id, $u_id, $email,$address,$product,$price)
    {
        $query = "INSERT INTO ". Order::$table_name ." VALUES(NULL,?,?,?,?,?,?)";

        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1, $p_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $u_id, PDO::PARAM_INT);
        $stmt->bindParam(3, $email, PDO::PARAM_STR);
        $stmt->bindParam(4, $address, PDO::PARAM_STR);
        $stmt->bindParam(5, $product, PDO::PARAM_STR);
        $stmt->bindParam(6, $price, PDO::PARAM_STR);
        return $stmt->execute();
    }



}