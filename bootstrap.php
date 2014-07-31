<?php
/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 29.07.14
 * Time: 12:29
 */
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require "mysql_connect.php";
require_once 'core/route.php';
require_once 'my_session.php';
session_start();
Route::start();
?>