<?php
/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 29.07.14
 * Time: 13:22
 */
class controller_404 extends controller
{
    function action_index()
    {
        $this->view->generate('404_view.php', 'template_view.php');
    }
}




?>