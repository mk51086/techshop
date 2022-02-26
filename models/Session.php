<?php


class Session
{

    public static function setUserIfLogged($user)
    {
        $_SESSION['email'] = $user;
        $_SESSION['role'] = false;
    }

    public static function setUserAdmin($user)
    {
        $_SESSION['email'] = $user;
        $_SESSION['role'] = true;
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

