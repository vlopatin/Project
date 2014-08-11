<?php

/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 07.08.14
 * Time: 18:10
 */
abstract class Model_Ajax_Profile extends Model
{
    function get_data($userId)
    {
        $mysqli = mysqli_get();
        $userId = mysqli_real_escape_string($mysqli, $userId);
        $sql = " SELECT * FROM users WHERE pid = '$userId' ";
        $result = mysqli_query($mysqli, $sql);

        if (!$row = mysqli_fetch_assoc($result)) {
            return NULL;
        } else {
            return $row;
        }
    }

    function save_data($userId, $name, $lastName)
    {
        $mysqli = mysqli_get();
        $userId = mysqli_real_escape_string($mysqli, $userId);
        $name = mysqli_real_escape_string($mysqli, $name);
        $lastName = mysqli_real_escape_string($mysqli, $lastName);
        $sql = " UPDATE users SET name = '$name', lastname = '$lastName' WHERE pid = '$userId' ";
        mysqli_query($mysqli, $sql);

    }


    function passwd_check($userId, $oldPass)
    {
        $mysqli = mysqli_get();
        $userId = mysqli_real_escape_string($mysqli, $userId);
        $oldPass = mysqli_real_escape_string($mysqli, $oldPass);
        $sql = " SELECT * FROM users WHERE pid = '$userId' AND password = '$oldPass' ";
        $result = mysqli_query($mysqli, $sql);

        if (!$row = mysqli_fetch_assoc($result)) {
            return false;
        } else {
            return true;
        }

    }

    function passwd_update($userId, $newPass)
    {
        $mysqli = mysqli_get();
        $userId = mysqli_real_escape_string($mysqli, $userId);
        $newPass = mysqli_real_escape_string($mysqli, $newPass);
        $sql = " UPDATE users SET password = '$newPass' WHERE pid = '$userId' ";
        mysqli_query($mysqli, $sql);
    }
}