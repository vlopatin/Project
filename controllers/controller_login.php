<?php

/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 29.07.14
 * Time: 13:22
 */
class Controller_Login extends controller
{
    function action_index()
    {
        $this->view->generate('login_view.php', 'template_view.php');
    }

    function action_signIn()
    {
        $result = Model_Login::is_registered($_POST['login'], $_POST['password']);

        if (!($row = mysqli_fetch_assoc($result))) {
            echo "<h3><i>Wrong user name or password !</i></h3>";
        } else {
            my_session_start($_POST['login']);
            header('Refresh: 0; "forum" ');
        }
    }
}

?>
