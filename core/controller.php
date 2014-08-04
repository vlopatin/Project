<?php
/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 29.07.14
 * Time: 13:12
 */
abstract class controller {

    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    function action_index()
    {
    }
}

?>