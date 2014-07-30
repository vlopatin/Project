<?php
/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 29.07.14
 * Time: 13:22
 */
Class Controller_Register extends controller
{
    function action_index()
    {
        $this->view->generate('register_view.php', 'template_view.php');

    }

    function action_add_user()
    {
	if (Model_Register::is_login_free($_POST['login'])) 
	{
		Model_Register::add_new_user($_POST['login'], 
					     $_POST['name'],
				             $_POST['lastname'],
					     $_POST['passwd']);
	
	    echo "<h3>Thank you!<br>
            Registration completed successfully.<br>
            Forum is loading...</h3>";
            header( 'Refresh: 2; "forum" ' );



	} else 
		{
		echo "Choose another login, please.";
	        header( 'Refresh: 2; "register" ' );
		}
	
	}
}
?>

//        require_once "mysql_connect.php";
//
//        $search = $_POST['login'];
//        $sql = " SELECT * FROM logins WHERE login = '$search' ";
//        $r = mysqli_query($mysqli, $sql);

//        if (!($row = mysqli_fetch_assoc($r)))
//          {
//            $login = mysqli_real_escape_string($mysqli, $_POST['login']);
//            $name = mysqli_real_escape_string($mysqli, $_POST['name']);
//            $lastname = mysqli_real_escape_string($mysqli, $_POST['lastname']);
//            $password = mysqli_real_escape_string($mysqli, $_POST['passwd']);

//            $sql = "INSERT INTO logins (pid, login, name, lastname, password) VALUES (NULL, '$login', '$name', '$lastname', '$password')";
//            mysqli_query($mysqli, $sql);





//            echo "<h3>Thank you!<br>
//            Registration completed successfully.<br>
//            Forum is loading...</h3>";
//            header( 'Refresh: 2; "forum" ' );
//          } else { echo "Choose another login, please.";
//            header( 'Refresh: 2; "register" ' );
//        }

           //  header('Location:http://' . $_SERVER['HTTP_HOST'] . '/');
            //exit;
