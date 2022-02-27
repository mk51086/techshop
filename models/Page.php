<?php
class Page{
    public static $table_name = 'pages';
    public $id;
    public $title;
    public $content;
    public $db;

   public  function __construct()
   {
    $this->db = new Database();
   }

    public function createPage($row){

        $page = new Page();
        $page->id = $row['id'];
        $page->title = $row['title'];
        $page->content = $row['content'];
        return $page;
    }

    public function getPages($v1,$v2){
        $query = "SELECT * FROM " . Page::$table_name . " LIMIT ?,?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1, $v1, PDO::PARAM_INT);
        $stmt->bindParam(2, $v2, PDO::PARAM_INT);
        $stmt->execute();
        $pages = [];
        while ($row = $stmt->fetch()) {
            $page = $this->createPage($row);
            $pages[]=$page;
        }
        return $pages;
    }

    public function totalRows()
    {
        $query = "SELECT * FROM " . Page::$table_name;
        $stmt = $this->db->conn->query($query)->rowCount();
        return $stmt;
    }

     public static function shortDesc($text)
    {
        if (strlen(substr($text, 0, 100)) <= 100) {
            return substr($text, 0, 100) . '...';
        } else {
            return $text;
        }
    }

    public function getPage($id)
    {
        $query = "SELECT * FROM " . Page::$table_name . " WHERE id = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $product = null;
        while ($row = $stmt->fetch()) {
            $product = $this->createPage($row);
        }
        return $product;
    }

    public function pageUpdate($title,$content,$id)
     {
         $pages = $this->getPage($id);
         $query = "UPDATE " . page::$table_name . " SET title = ?, content = ?  WHERE  id = ?";
         $stmt = $this->db->conn->prepare($query);
         $stmt->bindParam(1, $title  , PDO::PARAM_STR);
         $stmt->bindParam(2, $content   , PDO::PARAM_STR);
         $stmt->bindParam(3, $id, PDO::PARAM_INT);
         $stmt->execute();
         return $pages;
     }


}