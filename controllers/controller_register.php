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

        require_once "mysql_connect.php";
        mysql_query('CREATE TABLE if not exists logins(id INT, login TEXT, name TEXT, lastname TEXT, password TEXT)')
        or die("Mysql error: " . mysql_error()); echo "<br>";
           print_r($_POST['login']);
        echo "<br>";
        $search = $_POST['login'];
        if ( mysql_query('SELECT * FROM logins WHERE login=$search' ) == 0 )
        {

            $login = $_POST['login'];
            $name = $_POST['name'];
            $lastname = $_POST['lastname'];
            $password = $_POST['passwd'];
            echo ("<br>Таких нет!<br>");
            mysql_query('INSERT INTO logins SET id=2 login=$login name=$name lastname=$lastname password=$password');
            echo "Registration complete !";
            print_r ($_POST['login']);
echo("</br>");

            $r = mysql_query('SELECT * FROM logins ORDER BY name') or die(mysql_error());
            //print_r($result);
            for ($data=array(); $row=mysql_fetch_assoc($r); $data[]=$row); echo "<pre>"; print_r($data); echo "<pre>";



            echo("</br>");
        } else
        {
            echo "Такой тип уже зареган 1111";


        }



        //2323
     //   $this->view->generate('register_view.php', 'template_view.php');
   //     print_r("2323");
        echo ("АЗАЗЗА");
    }
}

?>