<?php

/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 07.08.14
 * Time: 18:09
 */
Class Controller_Ajax_Reset extends controller
{
    function action_reset()
    {
        $data = $_POST;

        try {
           $result = Model_Ajax_Reset::get_data($data['userId']);
        } catch (Exception $e) {
            echo "$e";
            return;
        }



//        $likesSumm = Model_Ajax_Like::get_likes_number($data['postId']);
//
//        $response = array("summ" => $likesSumm);
//
        $result = json_encode($result);
        //($result);
        //exit;
        print $result;

    }
}

?>