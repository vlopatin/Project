<?php
/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 29.07.14
 * Time: 13:26
 */
?>



    <div align="center"><b>
<?php
# Errors on page
$errReg = false;



# Проверка данных на корректность
if (isset($_REQUEST['doReg']))
{
    if (strlen($_REQUEST['login']) < 5 || strlen($_REQUEST['login']) > 10) { echo "Error: Login must be in 5-10 simbols !<br>"; $errReg = true;}
    if (strlen($_REQUEST['passwd']) < 5 || strlen($_REQUEST['login']) > 10) { echo "Error: Password must be in 5-10 simbols !<br>"; $errReg = true;}
    if (($_REQUEST['passwd']) !== $_REQUEST['passwdConfirm'])  { echo "Error: Passwords do not match !<br>"; $errReg = true;}
    if (strlen($_REQUEST['name']) < 3 || strlen($_REQUEST['name']) > 10) { echo "Error: Name must be in 3-10 simbols !<br>"; $errReg = true;}
    if (strlen($_REQUEST['lastname']) < 3 || strlen($_REQUEST['lastname']) > 10) { echo "Error: Lastname must be in 3-10 simbols !<br>"; $errReg = true;}
}

?>
</b></div>
<h2 align="center">Registration form</h2>

<div align="center">
    <?php if (!isset($_REQUEST['doReg']) || $errReg == true) {?>
    <form action = "register" method="post" >


        <b>login:<b>   <input type="text" name="login" required="1" value=""><br><br>


        <b>password:<b><input type="password" name="passwd" required="1"><br><br>


        <b>confirm:<b> <input type="password" name="passwdConfirm" value="" required="1"><br><br>


        <b>name:<b>    <input type="text" name="name"  required="1" value=""><br><br>


        <b>lastname:<b><input type="text" name="lastname"  required="1" value=""><br><br>
    <input type="submit" name="doReg" value="register"><br>

    </form>

</div>

<?php } else {


   Controller_Register::action_add_user();


#mysql_connect("localhost", "root", "q3fr3dq3")
#    or die("Error connecting to database: " . mysql_error());



} ?>