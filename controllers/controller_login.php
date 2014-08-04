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

        $login = $_POST['login'];
        $pass = $_POST['password'];

        $sql = " SELECT * FROM logins WHERE login = '$login' AND password = '$pass' ";
        $mysqli = mysqli_get();
        $r = mysqli_query($mysqli, $sql);

        if (!($row = mysqli_fetch_assoc($r))) {

            echo "<h3><i>Wrong user name or password !</i></h3>";
        } else {
            session_init($login);
            header('Refresh: 0; "forum" ');
        }

    }
}

?>
