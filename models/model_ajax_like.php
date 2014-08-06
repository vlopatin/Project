<?php

function add_like($postId, $userId)
{
    $postId = substr_replace($postId, '', 0, 4);
    $userId = substr_replace($userId, '', 0, 5);
    $userId = explode(' ', $userId);
    $userId = $userId['0'];

    $mysqli = mysqli_get();
    $postId = mysqli_real_escape_string($mysqli, $postId);
    $userId = mysqli_real_escape_string($mysqli, $userId);
    $sql = "INSERT INTO likes (pidPost, login) VALUES ('$postId', '$userId') ";
    mysqli_query($mysqli, $sql);
}

function get_likes_number($pidPost)
{
    $mysqli = mysqli_get();
    $sql = " SELECT COUNT(*) FROM likes WHERE pidPost = '$pidPost' ";
    $result = mysqli_query($mysqli, $sql);
    $numberOflikes = mysqli_fetch_row($result);

    return $numberOflikes[0];

}

function remove_like($postId, $userId)
{
    $postId = substr_replace($postId, '', 0, 4);
    $userId = substr_replace($userId, '', 0, 5);
    $userId = explode(' ', $userId);
    $userId = $userId['0'];
    $mysqli = mysqli_get();
    $postId = mysqli_real_escape_string($mysqli, $postId);
    $userId = mysqli_real_escape_string($mysqli, $userId);
    $sql = "DELETE FROM likes WHERE pidPost = '$postId' AND login = '$userId' ";

    mysqli_query($mysqli, $sql);
}


?>