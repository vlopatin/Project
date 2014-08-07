<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
    <script src="jquery-2.1.1.js"></script>
    <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src="script_profile.js"></script>

</head>


<h1 align="center">Profile</h1>

<div align="center">

    <a href="/login">Log in</a> - <a href="/forum/Guest">Forum Guest</a>

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


    <?php
    //if (!isset($_REQUEST['doReg']) || $errReg == true) {
    ?>

<div align=center style="background:#99FF99; width:200px; margin-left: auto; margin-right: auto;">
	<h3 align="center" style="color:#006600">Edit Account</h3>
	<form id="pid-<?php echo $_SESSION['user']?>" action="edit" method="post" name="editProfile">
		<input type="text" name="login" style="width:150px" required="1" placeholder="Login" value="<?php echo $_SESSION['user']; ?>" disabled="1">
        <input type="password" name="oldPasswd" style="width:150px" placeholder="Old password" required="1">
        <input type="password" name="newPasswd" style="width:150px" placeholder="New password" required="1">
        <input type="password" name="Confpasswd" style="width:150px" placeholder="Password confirm" value="" required="1">
        <input type="text" name="name" style="width:150px" placeholder="First name" required="1" value="">
        <input type="text" name="lastname" style="width:150px" placeholder="Last name" required="1" value="">

        <input type="button" name="bReset" style="width:150px" value="Reset changes">
		<input type="button" name="bCancel" style="width:75px" value="Cancel">
		<input type="submit" name="bSave" style="width:75px" value="Save">
    </form>
	<br>
</div>


