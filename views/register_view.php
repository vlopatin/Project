<?php
/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 29.07.14
 * Time: 13:26
 */
?>

<div align="center" style="background:#CCFFCC">
    <a href="/login">Log in</a> - <a href="/forum/Guest">Guest</a>
</div>


<div align="center" style='color: #FF3366;; font-size: 20px'>
    <b>
        <?php
        # Errors on page
        $errReg = false;

        # Check inputs
        if (isset($_POST['doReg'])) {
            if (strlen($_POST['login']) < 5 || strlen($_POST['login']) > 10) {
                echo "Error: Login must be in 5-10 simbols !<br>";
                $errReg = true;
            }
            if (strlen($_POST['passwd']) < 5 || strlen($_POST['passwd']) > 10) {
                echo "Error: Password must be in 5-10 simbols !<br>";
                $errReg = true;
            }
            if (($_POST['passwd']) !== $_POST['passwdConfirm']) {
                echo "Error: Passwords do not match !<br>";
                $errReg = true;
            }
            if (strlen($_POST['name']) < 3 || strlen($_POST['name']) > 10) {
                echo "Error: Name must be in 3-10 simbols !<br>";
                $errReg = true;
            }
            if (strlen($_POST['lastname']) < 3 || strlen($_POST['lastname']) > 10) {
                echo "Error: Lastname must be in 3-10 simbols !<br>";
                $errReg = true;
            }
        }

        ?>
    </b>
</div>

<!--<h2 align="center">Registration form</h2>-->

<!--<div align="center">-->

<?php
if (!isset($_POST['doReg']) || $errReg == true) {
    ?>

    <div align=center
         style="background:#99FF99; width:16%; margin-left: auto; margin-right: auto; position:absolute; left:42%; top:20%; ">
        <br>

        <h3 align="center" style="color:#006600">Enter account information</h3>
        <br>
        <img src='img/indus.jpg' class='unlike' alt='like' width='100'>
        <br>
        <br>

        <form action="register" method="post">
            <input type="text" name="login" style="width:70%" placeholder="Login" required="1" value="<?php isset($_POST['login']) ? print_r($_POST['login']) : print_r(''); ?>">
            <input type="text" name="name" style="width:70%" placeholder="First name" required="1" value="<?php isset($_POST['name']) ? print_r($_POST['name']) : print_r(''); ?>">
            <input type="text" name="lastname" style="width:70%" placeholder="Last name" required="1" value="<?php isset($_POST['lastname']) ? print_r($_POST['lastname']) : print_r(''); ?>">
            <input type="password" name="passwd" style="width:70%" placeholder="Password" required="1" value="<?php isset($_POST['passwd']) ? print_r($_POST['passwd']) : print_r(''); ?>">
            <input type="password" name="passwdConfirm" style="width:70%" placeholder="Password confirm" value="<?php isset($_POST['passwdConfirm']) ? print_r($_POST['passwdConfirm']) : print_r(''); ?>"
                   required="1">

            <input type="submit" name="doReg" style="width:70%" value="Send">
        </form>
        <br><br>
    </div>

    <!--</div>-->

<?php
} else {
    Controller_Register::action_add_user();
}
?>





