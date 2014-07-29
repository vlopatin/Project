<?php
/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 28.07.14
 * Time: 17:40
 */

$user = "root";
$pass = "q3fr3dq3";
$db = "forum";

mysql_connect("localhost", $user, $pass)
    or die("Could not connect: " . mysql_error());
@mysql_query("CREATE DATABASE $db");
mysql_select_db($db)
        or die("Could not select database:" . mysql_error());
?>