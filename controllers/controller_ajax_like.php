<?php

Class Controller_ajax_like extends controller
{
    function action_like()
    {
        //  print_r($_POST['jsonData']);
        //var_dump($_POST);
//        $data = json_decode($_POST, true);
        $data = $_POST;
        // var_dump(debug_backtrace());
        // exit;

        try {
            Model_Ajax_Like::add_like($data['postId'], $data['userId']);
        } catch (Exception $e) {
            echo "$e";
            return;
        }

        $likesSumm = Model_Ajax_Like::get_likes_number($data['postId']);

        $response = array("summ" => $likesSumm);

        $response = json_encode($response);

        print $response;

        //echo Model_Ajax_Like::get_likes_number($data['postId']);
        // echo $response;


    }

    function action_unlike()
    {
        $data = $_POST;

        try {
            Model_Ajax_Like::remove_like($data['postId'], $data['userId']);
        } catch (Exception $e) {
            echo "$e";
            return;
        }

        $likesSumm = Model_Ajax_Like::get_likes_number($data['postId']);

        $response = array("summ" => $likesSumm);

        $response = json_encode($response);

        print ($response);
    }
}

?>