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
        require_once "mysql_connect.php";

        $search = $_POST['login'];
        $pass = $_POST['password'];

        $sql = " SELECT * FROM logins WHERE login = '$search' AND password = '$pass' ";
        $r = mysqli_query($mysqli, $sql);

        if (!($row = mysqli_fetch_assoc($r))) {


            echo "<h2>Wrong user name/password !</h2>";
        } else { echo "<h2>
        <?php header('Location: '. '/forum'); ?>

        </h2>";}


        //echo "12";
    }
}

?>