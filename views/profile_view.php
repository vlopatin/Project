<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
    <script src="JScript/jquery-2.1.1.js"></script>
    <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src="JScript/script_profile.js"></script>
    <script src="JScript/jquery.md5.js"></script>
</head>

<!--<h1 align="center">Profile</h1>-->

<div align="center" style="background:#CCFFCC">

    <!--    ----------------------------------------------------MENU-->
    <?php if (isset($_SESSION['userId'])) { ?>

        <a href="/forum">Forum</a> - <a href="/forum/Guest">Log out</a>
    <?php
    } else {
        ?>

        <a href="/register">New user</a> - <a href="/login">Log in</a>

    <?php } ?>

</div>


<div align="center"><b>
        <?php
        # Errors on page
        $errReg = false;

        # Check inputs
        if (isset($_POST['bSave'])) {
//                if (strlen($_POST['login']) < 5 || strlen($_POST['login']) > 10) {
//                    echo "Error: Login must be in 5-10 simbols !<br>";
//                    $errReg = true;
//                }
//                if (strlen($_POST['passwd']) < 5 || strlen($_POST['login']) > 10) {
//                    echo "Error: Password must be in 5-10 simbols !<br>";
//                    $errReg = true;
//                }
//                if (($_POST['passwd']) !== $_POST['passwdConfirm']) {
//                    echo "Error: Passwords do not match !<br>";
//                    $errReg = true;
//                }
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

<?php

if (isset($_SESSION['userId'])) {

    ?>

    <div align=center
    style="background:#99FF99; width:16%; margin-left: auto; margin-right: auto; position:absolute; left:42%; top:20%;">
    <br>

    <h3 align="center" style="color:#006600">Edit Account</h3>
    <br>
    <img src='img/indus.jpg' alt='like' width='100'>
    <br>
    <br>
    <!-- ----------------------------------------------EDIT ACCOUNT-->

    <form id="pid-<?php echo $_SESSION['userId'] ?>" action="profile" method="post" name="editProfile">
        <input type="text" name="login" style="width:70%" required="1" placeholder="Login"
               value="<?php echo get_user_login($_SESSION['userId']); ?>" disabled="1">

        <input type="text" name="name" style="width:70%" placeholder="First name" required="1" value="">
        <input type="text" name="lastname" style="width:70%" placeholder="Last name" required="1" value="">

        <input type="button" name="bReset" style="width:70%" value="Reset changes">
        <input type="button" name="bCancel" style="width:34%" value="Cancel">
        <input type="button" name="bSave" style="width:34%" value="Save">
    </form>
    <br><br>




    <!-----------------------------------------------CHANGE PASSWORD-->



    <h3 align="center" style="color:#006600">Change Password</h3>
    <br>
    <img src='img/key.jpg' alt='key' width='100'>
    <br>
    <br>



    <form action="profile" method="post" name="changePassword">
        <input type="password" name="passwdOld" style="width:70%" placeholder="Old password" required="1">
        <input type="password" name="passwdNew" style="width:70%" placeholder="New password" required="1">
        <input type="password" name="passwdConf" style="width:70%" placeholder="Password confirm" required="1">
        <input type="button" name="bChange" style="width:34%" value="Change">
    </form>
    <br><br>




    <?php
    if (isset($_POST['bSave']) && !$errReg) {
        Controller_Profile::update_info();
        unset($_POST['bSave']);
    }

} else {
    ?>

    <div align=center
         style="background:#99FF99; width:16%; margin-left: auto; margin-right: auto; position:absolute; left:42%; top:20%;">
        <h1><a href="/register">Go to registration</a></h1>
    </div>
    </div>

<?php
}
?>