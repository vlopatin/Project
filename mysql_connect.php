<?php
/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 28.07.14
 * Time: 17:40
 */


/**
$user = "root";
$pass = "Uragan456";
$db = "forum";
$server = "localhost";

$mysqli = new mysqli($server, $user, $pass, $db);
if ($mysqli->connect_error)
<<<<<<< HEAD
{
=======
 {
>>>>>>> d3ad72dbe38471712db5108b8f7bda870507798f
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
 }

$sql = "CREATE DATABASE $db";
mysqli_query($mysqli, $sql);

$sql = "CREATE TABLE if not exists logins(pid INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(pid), login CHAR(10), name CHAR(10), lastname CHAR(10), password CHAR(10))";
mysqli_query($mysqli, $sql);
//$mysqli->close();
<<<<<<< HEAD

/**
 * @return mysqli
 */

function mysqli_get() {
    static $conn;

    if (is_null($conn)) {
        $user = "root";
        $pass = "Uragan456";
        $db = "forum";
        $server = "localhost";

        $conn = new mysqli($server, $user, $pass, $db);

        $mysqli = new mysqli($server, $user, $pass, $db);
        if ($mysqli->connect_error)
        {
            die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        }

        $sql = "CREATE DATABASE $db";
        mysqli_query($mysqli, $sql);

        $sql = "CREATE TABLE if not exists logins(pid INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(pid), login CHAR(10), name CHAR(10), lastname CHAR(10), password CHAR(10))";
        mysqli_query($mysqli, $sql);

        $sql = "CREATE TABLE if not exists posts(pid INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(pid), author CHAR(10), title CHAR(15), message CHAR(95))";
        mysqli_query($mysqli, $sql);

        if ($conn->connect_error)
        {
            die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
        }
    }

    return $conn;
}




?>

=======
?>
>>>>>>> d3ad72dbe38471712db5108b8f7bda870507798f
