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
}

?>