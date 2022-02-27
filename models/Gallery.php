<?php
class Gallery{
    public $id;
    public $image;
    public $prodID;
    public static $table_name = 'gallery';
    private $db;
    public function __construct ()
    {
        $this->db=new Database();
    }

    public function getAllGalleryImages()
    {
        $query = "SELECT * FROM " . Gallery::$table_name;
        $stmt = $this->db->conn->query($query);
       $galleryItems= [];
        while ($row = $stmt->fetch()) {
            $gallery = $this->createGallery($row);
            $galleryItems[] = $gallery;
        }
        return $galleryItems;
    }

    public function getAllGalleryImagesProduct($id)
    {
        $query = "SELECT * FROM " . Gallery::$table_name . " WHERE ProductID = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute();
        $galleryItems= [];
        while ($row = $stmt->fetch()) {
            $gallery = $this->createGallery($row);
            $galleryItems[] = $gallery;
        }
        return $galleryItems;
    }


    public function createGallery($row){

        $gallery = new Gallery();
        $gallery->id = $row['id'];
        $gallery->image = $row['image'];
        $gallery->prodID = $row['ProductID'];
        return $gallery;
    }

    public function getGallerysPage($v1, $num_of_Gallerys)
    {
        $query = "SELECT * FROM " . Gallery::$table_name . " LIMIT ?,?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1, $v1, PDO::PARAM_INT);
        $stmt->bindParam(2, $num_of_Gallerys, PDO::PARAM_INT);
        $stmt->execute();
       $galleryItems= [];
        while ($row = $stmt->fetch()) {
            $gallery = $this->createGallery($row);
            $galleryItems[]=$gallery;
        }
        return $galleryItems;
    }

    public function totalRows()
    {
        $query = "SELECT * FROM " . Gallery::$table_name;
        $stmt = $this->db->conn->query($query)->rowCount();
        return $stmt;
    }


    public function getGallery($id)
    {
        $query = "SELECT * FROM " . Gallery::$table_name . " WHERE id = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $gallery = null;
        while ($row = $stmt->fetch()) {
            $gallery = $this->createGallery($row);
        }
        return $gallery;
    }

    public function getGalleryProduct($id)
    {
        $query = "SELECT * FROM " . Gallery::$table_name . " WHERE ProductID = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $gallery = null;
        while ($row = $stmt->fetch()) {
            $gallery = $this->createGallery($row);
        }
        var_dump($gallery);
        return $gallery;
    }


    public function delGallerysById($id)
    {
        $gallery = $this->getGallery($id);
        File::deleteGalleryImage($gallery->image);
        $query = "DELETE FROM " . Gallery::$table_name . " WHERE id = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function galleryUpdate($prod,$unique_img,$id)
    {
        $gallery = $this->getGallery($id);
        $query = "UPDATE " . Gallery::$table_name . " SET image = ?, ProductID = ? WHERE id = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1, $unique_img, PDO::PARAM_STR);
        $stmt->bindParam(2, $prod  , PDO::PARAM_INT);
        $stmt->bindParam(3, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $gallery;
    }

    public function addGallery($prod,$unique_img)
    {
        var_dump($prod);
        $query = "INSERT INTO " . Gallery::$table_name . " VALUES (NULL,?,?)";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1, $unique_img, PDO::PARAM_STR);
        $stmt->bindParam(2, $prod  , PDO::PARAM_INT);
        return  $stmt->execute();
    }

}