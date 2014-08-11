<?php

abstract Class Model_Register extends Model
{
    static function is_login_free($loginToCheck)
    {
        $mysqli = mysqli_get();
        $sql = " SELECT * FROM users WHERE login = '$loginToCheck' ";
        $result = mysqli_query($mysqli, $sql);

        if (!($row = mysqli_fetch_assoc($result))) {
            return true;
        } else {
            return false;
        }
    }

    static function add_new_user($login, $name, $lastname, $password)
    {
        $mysqli = mysqli_get();

        $login = mysqli_real_escape_string($mysqli, $login);
        $name = mysqli_real_escape_string($mysqli, $name);
        $lastname = mysqli_real_escape_string($mysqli, $lastname);
        $password = mysqli_real_escape_string($mysqli, $password);

        $sql = "INSERT INTO users (pid, login, name, lastname, password) VALUES (NULL, '$login', '$name', '$lastname', MD5('$password')) ";
        mysqli_query($mysqli, $sql);
        my_session_start($login);
    }

}

?>
