<?php

/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 29.07.14
 * Time: 13:22
 */
Class Controller_Register extends controller
{
    function action_index()
    {
        $this->view->generate('register_view.php', 'template_view.php');
    }

    function action_add_user()
    {
        if (Model_Register::is_login_free($_POST['login'])) {
            Model_Register::add_new_user($_POST['login'],
                $_POST['name'],
                $_POST['lastname'],
                $_POST['passwd']);


            echo '<div align=center style="background:#99FF99; width:24%; margin-left: auto; margin-right: auto; position:absolute; top:20%; left:38%">';

            echo "<br><h3 align='center' style='color:#006600'>Thank you!<br>
            Registration completed successfully.<br>
            Forum is loading...</h3><br>";
            echo '</div>';
            header('Refresh: 2; "forum" ');
        } else {
            echo "Choose another login, please.";
            header('Refresh: 2; "register" ');
        }

    }
}

?>
