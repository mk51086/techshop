<?php


class Session
{

    public static function start()
    {
        ob_start();
        session_start();
    }

    public static function end()
    {
        session_destroy();
    }

}

