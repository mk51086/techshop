<?php

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
    public $image;

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
            $product = $this->createProduct($row);
            $products[] = $product;
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
        $query = "SELECT * FROM " . Product::$table_name . " ORDER BY data DESC LIMIT ".$numri;
        $stmt = $this->db->conn->query($query);
        $products = [];
        while ($row = $stmt->fetch()) {
            $product = $this->createProduct($row);
            $products[] = $product;
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
            $product = $this->createProduct($row);
        }
        return $product;
    }




     public function getProductsPage($v1,$v2){
         $query = "SELECT * FROM " . Product::$table_name . " ORDER BY data DESC LIMIT ?,?";
         $stmt = $this->db->conn->prepare($query);
         $stmt->bindParam(1, $v1, PDO::PARAM_INT);
         $stmt->bindParam(2, $v2, PDO::PARAM_INT);
         $stmt->execute();
         $products = [];
         while ($row = $stmt->fetch()) {
             $product = $this->createProduct($row);
             $products[]=$product;
         }
         return $products;
     }
     
    public function getRecommended($id){
            $query = "SELECT * FROM " . Product::$table_name . " WHERE ProductID != ?  ORDER BY RAND() LIMIT 4";
            $stmt = $this->db->conn->prepare($query);
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->execute();
            $products = [];

     while ($row = $stmt->fetch()) {
             $product = $this->createProduct($row);
             $products[] = $product;
         }
         return $products;
    }
 

     public function createProduct($row){

         $product = new Product();
         $product->id = $row['ProductID'];
         $product->name = $row['Name'];
         $product->desc = $row['Description'];
         $product->price = $row['Price'];
         $product->data = $row['data'];
         $product->quantity = $row['quantity'];
         $product->image = $row['image'];
         return $product;
     }


     public function addProduct($emri, $desc, $cmimi, $sasia,$image)
     {
         $query = "INSERT INTO products (Name,Description,Price,quantity,image) VALUES(?,?,?,?,?)";
         $stmt = $this->db->conn->prepare($query);
         $stmt->bindParam(1, $emri, PDO::PARAM_STR);
         $stmt->bindParam(2, $desc, PDO::PARAM_STR);
         $stmt->bindParam(3, $cmimi, PDO::PARAM_STR);
         $stmt->bindParam(4, $sasia, PDO::PARAM_STR);
         $stmt->bindParam(5, $image, PDO::PARAM_STR);
         return $stmt->execute();
     }

     public function delProById($id)
     {
         $product = $this->getProduct($id);
         File::deleteProductImage($product->image);
         $query = "DELETE FROM " . Product::$table_name . " WHERE ProductID = ?";
         $stmt = $this->db->conn->prepare($query);
         $stmt->bindParam(1, $id, PDO::PARAM_INT);
         return $stmt->execute();
     }




 }