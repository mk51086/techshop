<?php


class Session
{

    public static function setUserIfLogged($user)
    {
        $_SESSION['email'] = $user;
        $_SESSION['role'] = 0;
    }

    public static function setUserAdmin($user)
    {
        $_SESSION['email'] = $user;
        $_SESSION['role'] = 1;
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

