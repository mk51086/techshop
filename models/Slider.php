<?php
class Slider{
    public $id;
    public $image;
    public $link;
    public static $table_name = 'slider';
    private $db;
    public function __construct ()
    {
        $this->db=new Database();
    }

    public function getAllSliders()
    {
        $query = "SELECT * FROM " . Slider::$table_name;
        $stmt = $this->db->conn->query($query);
        $sliders = [];
        while ($row = $stmt->fetch()) {
            $slider = $this->createSlider($row);
            $sliders[] = $slider;
        }
        return $sliders;
    }

    public function createSlider($row){

        $slider = new Slider();
        $slider->id = $row['id'];
        $slider->image = $row['img'];
        $slider->link = $row['link'];
        return $slider;
    }

    public function getSlidersPage($v1, $num_of_sliders)
    {
        $query = "SELECT * FROM " . Slider::$table_name . " LIMIT ?,?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1, $v1, PDO::PARAM_INT);
        $stmt->bindParam(2, $num_of_sliders, PDO::PARAM_INT);
        $stmt->execute();
        $sliders = [];
        while ($row = $stmt->fetch()) {
            $slider = $this->createSlider($row);
            $sliders[]=$slider;
        }
        return $sliders;
    }

    public function totalRows()
    {
        $query = "SELECT * FROM " . Slider::$table_name;
        $stmt = $this->db->conn->query($query)->rowCount();
        return $stmt;
    }

    public function delSlideId($id)
    {
        $slider = $this->getSlider($id);
        $query = "DELETE FROM " . Slider::$table_name . " WHERE id = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }


    public function getSlider($id)
    {
        $query = "SELECT * FROM " . Slider::$table_name . " WHERE id = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $slider = null;
        while ($row = $stmt->fetch()) {
            $slider = $this->createSlider($row);
        }
        return $slider;
    }

    public function delSlidersById($id)
     {
         $slider = $this->getSlider($id);
         File::deleteSliderImage($slider->img);
         $query = "DELETE FROM " . Slider::$table_name . " WHERE id = ?";
         $stmt = $this->db->conn->prepare($query);
         $stmt->bindParam(1, $id, PDO::PARAM_INT);
         return $stmt->execute();
     }

    public function sliderUpdate($link,$unique_img,$id)
    {
        $slider = $this->getSlider($id);
        $query = "UPDATE " . Slider::$table_name . " SET img = ?, link = ? WHERE id = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1, $unique_img, PDO::PARAM_STR);
        $stmt->bindParam(2, $link  , PDO::PARAM_STR);
        $stmt->bindParam(3, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $slider;
    }

}