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

    public static function getMediaUserRoot()
    {
        return self::getRoot() . 'uploads/user_images/';
    }
}