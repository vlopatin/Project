<?php
/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 28.07.14
 * Time: 17:40
 */

function mysqli_get()
{
    static $conn;

    if (is_null($conn)) {
        $user = "root";
        $pass = "Uragan456";
        $db = "forum";
        $server = "localhost";

        $conn = new mysqli($server, $user, $pass, $db);

        $sql = "CREATE DATABASE $db";
        mysqli_query($conn, $sql);

        $sql = "CREATE TABLE if not exists users(pid INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(pid), login CHAR(15), name CHAR(20), lastname CHAR(20), password CHAR(35))";
        mysqli_query($conn, $sql);

        $sql = "CREATE TABLE if not exists posts(pid INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(pid), authorId INT(10), title CHAR(15), message CHAR(95))";
        mysqli_query($conn, $sql);

        $sql = "CREATE TABLE if not exists likes(pidPost INT NOT NULL, pidUser INT NOT NULL)";
        mysqli_query($conn, $sql);


        if ($conn->connect_error) {
            die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
        }
    }

    return $conn;
}


?>
