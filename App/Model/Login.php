<?php


namespace App\Model;

use mysqli;

class Login
{
    public static function Login($link, $user, $pass, $level)
    {
        if ($level == "Admin")
            $sql = "SELECT * FROM admin where Username='" . md5($user) . "' and  Password='" . md5($pass) . "'";
        

        $query = mysqli_query($link, $sql);
        echo mysqli_error($link);
        return mysqli_fetch_assoc($query);
    }
}