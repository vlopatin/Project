<?php

/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 29.07.14
 * Time: 13:23
 */
Class Controller_Forum extends Controller
{
    function action_index()
    {
        $this->view->generate('forum_view.php', 'template_view.php');
    }

    function action_guest()
    {
        my_session_end();



        //$_SESSION['user'] = "Anon";

        header('Refresh: 0; "/forum&page=1" ');
    }

    function action_add_post($authorId, $title, $message)
    {
        $mysqli = mysqli_get();
        $authorId = mysqli_real_escape_string($mysqli, $authorId);
        $title = mysqli_real_escape_string($mysqli, $title);

        Model_Forum::add_new_post($authorId, $title, $message);
    }

    function get_posts($page)
    {
        return Model_Forum::get_posts($page);
    }

    function action_del_message()
    {
        $data = $_GET;
        $sesUserId = $_SESSION['userId'];
        if (Model_Forum::is_post_owner($sesUserId, $data['postId'])) {
            Model_Forum::delete_post($data['postId']);
        } else {
            echo null;
            return;
        }
        echo "OK";
    }

    function get_pages_number()
    {
        $result = Model_Forum::get_posts_number();
        $numberOfRows = mysqli_fetch_row($result);
        return ceil($numberOfRows[0] / DEFAULT_NUMBER_POSTS_ON_PAGE);
    }


}

?>

