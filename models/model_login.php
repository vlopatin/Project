<?php

/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 29.07.14
 * Time: 13:24
 */
abstract Class Model_Login extends Model
{
    static function is_registered($login, $pass)
    {
        $mysqli = mysqli_get();
        $sql = " SELECT * FROM users WHERE login = '$login' AND password = MD5('$pass') ";

        $result = mysqli_query($mysqli, $sql);

        return $result;
    }
}

?>