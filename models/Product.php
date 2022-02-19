<?php
include_once("Database.php");
   
 class Product
	{
	private $db;
	public static $table_name = 'products';
    public $id;
    public $name;
    public $desc;
    public $price;
    public $data;
    public $quantity;

	    public function __construct ()
		{
			$this->db=new Database();
		}

  public function getAllProducts()
    {
        $query = "SELECT * FROM " . Product::$table_name;
        $stmt = $this->db->conn->query($query);
        $products = [];
        while ($row = $stmt->fetch()) {
            $product = new Product();
            $product->id = $row['ProductID'];
            $product->name = $row['Name'];
            $product->desc = $row['Description'];
            $product->price = $row['Price'];
            $product->data = $row['data'];
            $product->quantity = $row['quantity'];
            array_push($products, $product);
        }
        return $products;
    }


 	public function totalRows()
    {
        $query = "SELECT * FROM " . Product::$table_name;
        $stmt = $this->db->conn->query($query)->rowCount();
        return $stmt;
    }


	 public function getNumProducts($numri)
    {
        $query = "SELECT * FROM " . Product::$table_name . " LIMIT ".$numri;
        $stmt = $this->db->conn->query($query);
        $products = [];
        while ($row = $stmt->fetch()) {
            $product = new Product();
            $product->id = $row['ProductID'];
            $product->name = $row['Name'];
            $product->desc = $row['Description'];
            $product->price = $row['Price'];
            $product->data = $row['data'];
            $product->quantity = $row['quantity'];
            array_push($products, $product);
        }
        return $products;
    }

   public function getProduct($id)
    {
        $query = "SELECT * FROM " . Product::$table_name . " WHERE ProductID = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();  
        $product = null;
        while ($row = $stmt->fetch()) {
            $product = new Product();
         	$product->id = $row['ProductID'];
            $product->name = $row['Name'];
            $product->desc = $row['Description'];
            $product->price = $row['Price'];
            $product->data = $row['data'];
            $product->quantity = $row['quantity'];
        }
        return $product;
    }

}   