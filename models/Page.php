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

    static public function shortDesc($text)
    {
        if (strlen(substr($text, 0, 100)) <= 100) {
            return substr($text, 0, 100) . '...';
        } else {
            return $text;
        }
    }
}