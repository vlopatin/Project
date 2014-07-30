<?php
/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 28.07.14
 * Time: 17:40
 */

$user = "root";
$pass = "Uragan456";
$db = "forum";
$server = "localhost";

$mysqli = new mysqli($server, $user, $pass, $db);
if ($mysqli->connect_error)
 {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
 }

$sql = "CREATE DATABASE $db";
mysqli_query($mysqli, $sql);

$sql = "CREATE TABLE if not exists logins(pid INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(pid), login CHAR(10), name CHAR(10), lastname CHAR(10), password CHAR(10))";
mysqli_query($mysqli, $sql);
//$mysqli->close();
?>
