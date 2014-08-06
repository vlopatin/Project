<?php
/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 29.07.14
 * Time: 13:24
 */

/*
function add_new_post($author, $title, $message)
{
    //$mysqli = mysqli_get();
    $author = mysqli_real_escape_string($mysqli, $author);
    $title = mysqli_real_escape_string($mysqli, $title);
    $message = mysqli_real_escape_string($mysqli, $message);

    $sql = "INSERT INTO posts (pid, author, title, message) VALUES (NULL, '$author', '$title', '$message' ) ";
    mysqli_query($mysqli, $sql);
}
*/

function is_post_liked($sesUser, $pidPost)
{
    $mysqli = mysqli_get();
    $sql = " SELECT * FROM likes WHERE login = '$sesUser' AND pidPost= '$pidPost' ";
    $result = mysqli_query($mysqli, $sql);

    if (!$row = mysqli_fetch_assoc($result)) {
        return false;
    } else {
        return true;
    }
}

function get_likes_number($pidPost)
{
    $mysqli = mysqli_get();
    $sql = " SELECT COUNT(*) FROM likes WHERE pidPost = '$pidPost' ";
    $result = mysqli_query($mysqli, $sql);
    $numberOflikes = mysqli_fetch_row($result);

    return $numberOflikes[0];

}


?>