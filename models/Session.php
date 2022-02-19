<?php


class Session
{

 public static function setUserIfLogged($user)
    {
        $_SESSION['email'] = $user;
    }

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

