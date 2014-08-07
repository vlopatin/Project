<?php
/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 29.07.14
 * Time: 13:26
 */
?>

<div align="center">
    <a href="/login">Log in</a> - <a href="/forum/Guest">Guest</a>
</div>


<div align="center"><b>
    <?php
        # Errors on page
        $errReg = false;

        # Check inputs
        if (isset($_REQUEST['doReg'])) {
            if (strlen($_REQUEST['login']) < 5 || strlen($_REQUEST['login']) > 10) {
                echo "Error: Login must be in 5-10 simbols !<br>";
                $errReg = true;
            }
            if (strlen($_REQUEST['passwd']) < 5 || strlen($_REQUEST['login']) > 10) {
                echo "Error: Password must be in 5-10 simbols !<br>";
                $errReg = true;
            }
            if (($_REQUEST['passwd']) !== $_REQUEST['passwdConfirm']) {
                echo "Error: Passwords do not match !<br>";
                $errReg = true;
            }
            if (strlen($_REQUEST['name']) < 3 || strlen($_REQUEST['name']) > 10) {
                echo "Error: Name must be in 3-10 simbols !<br>";
                $errReg = true;
            }
            if (strlen($_REQUEST['lastname']) < 3 || strlen($_REQUEST['lastname']) > 10) {
                echo "Error: Lastname must be in 3-10 simbols !<br>";
                $errReg = true;
            }
        }

    ?>
</b>
</div>

<h2 align="center">Registration form</h2>

<div align="center">

    <?php
    if (!isset($_REQUEST['doReg']) || $errReg == true) {
    ?>

    <div align=center style="background:#99FF99; width:200px; margin-left: auto; margin-right: auto;">
	<h3 align="center" style="color:#006600">Account information</h3>
	<form action="register" method="post">
       		<input type="text" name="login" style="width:150px" placeholder="Login" required="1" value="">
		<input type="text" name="name" style="width:150px" placeholder="First name" required="1" value="">
		<input type="text" name="lastname" style="width:150px" placeholder="Last name" required="1" value="">
		<input type="password" name="passwd" style="width:150px" placeholder="Password" required="1">
                <input type="password" name="passwdConfirm" style="width:150px" placeholder="Password confirm" value="" required="1">	
       	        <input type="submit" name="doReg" style="width:150px" value="Send">
	</form>
	<br>
</div>

</div>

<?php
} else {
    Controller_Register::action_add_user();
}
?>





