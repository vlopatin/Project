<?php
/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 29.07.14
 * Time: 13:24
 */



/**function add_new_post($author, $title, $message)
{
    $mysqli = mysqli_get();
    $author = mysqli_real_escape_string($mysqli, $author);
    $title = mysqli_real_escape_string($mysqli, $title);
    $message = mysqli_real_escape_string($mysqli, $message);

    $sql = "INSERT INTO posts (pid, author, title, message) VALUES (NULL, '$author', '$title', '$message' ) ";
    mysqli_query($mysqli, $sql);
} */

?>