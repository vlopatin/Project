<?php
Class Model_Register extends Model
{

static boolean function is_login_free($loginToCheck)
 {
	require_once "mysql_connect.php"; 
	
	$sql = " SELECT * FROM logins WHERE login = '$loginToCheck' ";
	$result = mysqli_query($mysqli, $sql);
	
	$mysqli->close();	
	
	if (!($row = mysqli_fetch_assoc($result)))
	{
	  return true; }
		 else { return false;} 
	}
 }

static function add_user($login, $name, $lastname, $password)
{
	require_once "mysql_connect.php";
	$login = mysqli_real_escape_string($mysqli, $login);
	$name = mysqli_real_escape_string($mysqli, $name);
	$lastname = mysqli_real_escape_string($mysqli, $lastname);
	$password = mysqli_real_escape_string($mysqli, $password);

	$sql = "INSERT INTO logins (pid, login, name, lastname, password) VALUES (NULL, '$login', '$name', '$lastname', '$password' ) ";
	mysqli_query($mysqli, $sql);
	
}

}


?>
