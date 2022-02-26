<?php

class Config
{
    public static function getRoot()
    {
        return $_SERVER['DOCUMENT_ROOT'] . '/techshop/';
    }

    public static function getAdminRoot()
    {
        return self::getRoot() . 'admin/';
    }

    public static function getMediaProductRoot()
    {
        return self::getRoot() . 'uploads/product_images/';
    }


     public static function getSliderRoot()
    {
        return self::getRoot() . 'uploads/sliders/';
    }

    public static function getMediaUserRoot()
    {
        return self::getRoot() . 'uploads/user_images/';
    }
    public static function getMediaProductImageUrl()
    {
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https://' ? 'https://' : 'http://';
        return $protocol . $_SERVER['HTTP_HOST'] . '/techshop/uploads/product_images/';
    }
}