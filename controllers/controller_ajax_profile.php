<?php

/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 07.08.14
 * Time: 18:09
 */
Class Controller_Ajax_Profile extends controller
{
    function action_reset()
    {
        $data = $_POST;

        try {
            $result = Model_Ajax_Profile::get_data($data['userId']);
        } catch (Exception $e) {
            echo "$e";
            return;
        }


//        $likesSumm = Model_Ajax_Like::get_likes_number($data['postId']);
//
//        $response = array("summ" => $likesSumm);
//
        $result = json_encode($result);

        print $result;

    }

    function action_save()
    {

        // var_dump($_POST);
        //  exit;

        $data = $_POST;
        try {
            Model_Ajax_Profile::save_data($data['userId'], $data['name'], $data['lastName']);
        } catch (Exception $e) {
            echo "$e";
            return;
        }

        $result = json_encode('Saved');


        // echo $result;

        print $result;

    }


    function action_change_pswd()
    {
        $data = $_POST;
        try {
            if (Model_Ajax_Profile::passwd_check($data['userId'], $data['passwdOldMD5'])) {

                Model_Ajax_Profile::passwd_update($data['userId'], $data['passwdNewMD5']);
                $result = json_encode('Password Changed !');
                print $result;
                return;
            } else {
                $result = json_encode('Error, password dont Changed! Please, check old password!');
                print $result;
                return;
            }
        } catch (Exception $e) {
            echo "$e";
            return;
        }

    }

}

?>