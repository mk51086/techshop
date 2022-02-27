<?php


class Session
{

    public static function setUserIfLogged($user,$id)
    {
        $_SESSION['email'] = $user;
        $_SESSION['role'] = false;
        $_SESSION['id'] = $id;
    }

    public static function setUserAdmin($user,$id)
    {
        $_SESSION['email'] = $user;
        $_SESSION['role'] = true;
        $_SESSION['id'] = $id;
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

