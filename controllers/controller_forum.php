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



}


?>

