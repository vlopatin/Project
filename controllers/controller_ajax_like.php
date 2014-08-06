<?php

Class Controller_ajax_like extends controller
{
    function action_like()
    {

        try {
            add_like($_POST['postId'],$_POST['userId']);
        } catch (Exception $e) {
            echo "$e";
            return;
        }

        echo get_likes_number(substr_replace($_POST['postId'], '', 0, 4));


    }

    function action_unlike()
    {

        try {
            remove_like($_POST['postId'], $_POST['userId']);
        } catch (Exception $e) {
            echo "$e";
            return;
        }
        echo get_likes_number(substr_replace($_POST['postId'], '', 0, 4));
    }
}

?>