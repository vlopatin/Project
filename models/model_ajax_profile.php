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
        $sql = " SELECT * FROM logins WHERE login = '$userId' ";
        $result = mysqli_query($mysqli, $sql);

        if (!$row = mysqli_fetch_assoc($result)) {
            return NULL;
        } else {
            return $row;
        }


    }

}