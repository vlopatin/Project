<?php

abstract class Model_Forum
{

    function add_new_post($authorId, $title, $message)
    {
        $mysqli = mysqli_get();
        $sql = "INSERT INTO posts (pid, authorId, title, message) VALUES (NULL, '$authorId', '$title', '$message' ) ";
        mysqli_query($mysqli, $sql);
    }

    function delete_post($pid)
    {
        $mysqli = mysqli_get();
        $sql = " DELETE FROM posts WHERE pid = '$pid' ";
        mysqli_query($mysqli, $sql);
        $sql = " DELETE FROM likes WHERE pidPost = '$pid' ";
        mysqli_query($mysqli, $sql);
    }

    function is_post_owner($userId, $pid)
    {
        $mysqli = mysqli_get();
        $sql = " SELECT * FROM posts WHERE pid = '$pid' AND authorId = '$userId' ";
        $result = mysqli_query($mysqli, $sql);

        if (!$row = mysqli_fetch_assoc($result)) {
            return false;
        } else {
            return true;
        }
    }


    function get_posts_number()
    {
        $mysqli = mysqli_get();
        $sql = " SELECT COUNT(*) FROM posts ";
        return mysqli_query($mysqli, $sql);
    }

    function get_posts($page = 1)
    {
        $mysqli = mysqli_get();
        $sql = " SELECT * FROM posts ORDER BY pid desc LIMIT " . ($page - 1) * DEFAULT_NUMBER_POSTS_ON_PAGE . ", " . DEFAULT_NUMBER_POSTS_ON_PAGE;
        return mysqli_query($mysqli, $sql);
    }


    function is_post_liked($sesUserId, $pidPost)
    {
        $mysqli = mysqli_get();
        $sql = " SELECT * FROM likes WHERE pidUser = '$sesUserId' AND pidPost= '$pidPost' ";
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
}

?>