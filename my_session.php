<?php
/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 31.07.14
 * Time: 13:14
 */
function my_session_start($login)
{
    if (!isset($_COOKIE["PHPSESSID"])) {
        session_start();
    }
    $_SESSION['userId'] = get_user_id($login);

}

function my_session_end()
{
    unset($_SESSION['userId']);
    session_destroy();
}

function get_user_id($login)
{
    $mysqli = mysqli_get();
    $sql = " SELECT * FROM users WHERE login = '$login' ";
    $result = mysqli_query($mysqli, $sql);

    if (!$row = mysqli_fetch_assoc($result)) {
        return false;
    } else return $row['pid'];
}

function get_user_login($pid)
{
    $mysqli = mysqli_get();
    $sql = " SELECT * FROM users WHERE pid = '$pid' ";
    $result = mysqli_query($mysqli, $sql);

    if (!$row = mysqli_fetch_assoc($result)) {
        return false;
    } else return $row['login'];
}


function UserId_get()
{
}


?>