<?php
class File{
    public static function delete($name)
    {
        unlink($name);
    }
    public static function makeImageUnique($ext)
    {
        return substr(md5(time()), 0, 10).'.'.$ext;
    }

    public static function uploadProductImage($tmp_image, $image)
    {
        return move_uploaded_file($tmp_image, Config::getMediaProductRoot() . $image);

    }

    public static function deleteProductImage($name)
    {
        self::delete(Config::getMediaProductRoot() . $name);
    }

}