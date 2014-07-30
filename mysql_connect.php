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
//mysqli_connect("localhost", $user, $pass) or die("Could not connect: " . mysql_error());
//mysql_connect("localhost", $user, $pass)

//@mysqli_query("CREATE DATABASE $db");
//@mysql_query("CREATE DATABASE $db");

//mysqli_select_db($db)
  //      or die("Could not select database:" . mysql_error());

$mysqli = new mysqli($server, $user, $pass, $db);
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$sql = "CREATE DATABASE $db";
mysqli_query($mysqli, $sql);
$sql = "CREATE TABLE if not exists logins(pid INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(pid), login CHAR(10), name CHAR(10), lastname CHAR(10), password CHAR(10))";
mysqli_query($mysqli, $sql);








//$mysqli->query("CREATE DATABASE $db");

//$city = "'s Hertogenbosch";

/* этот запрос вызовет ошибку, так как мы не экранировали $city */
//if (!$mysqli->query("INSERT into myCity (Name) VALUES ('$city')")) {
//    printf("Ошибка: %s\n", $mysqli->sqlstate);
//}

//$city = $mysqli->real_escape_string($city);

/* этот запрос отработает нормально */
//if ($mysqli->query("INSERT into myCity (Name) VALUES ('$city')")) {
//    printf("%d строк вставлено.\n", $mysqli->affected_rows);
//}

//$mysqli->close();

//mysqli_query($mysqli, "CREATE DATABASE $db");
//@mysqli_query("CREATE DATABASE $db");



?>