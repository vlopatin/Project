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


<div align="center">

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

    <form id='<?php echo $_SESSION['user']?>' action="edit" method="post" name="editProfile">
        <table>
            <tr>
                <td><b>login:<b></td>
                <td><input type="text" name="login" required="1" value="<?php echo $_SESSION['user']; ?>" disabled="1"></b></td>
            </tr>

            <tr>
                <td><b>old password:</b></td>
                <td><input type="password" name="oldPasswd" required="1"></td>
            </tr>


            <tr>
                <td><b>new password:</b></td>
                <td><input type="password" name="newPasswd" required="1"></td>
            </tr>

            <tr>
                <td><b>confirm:</b></td>
                <td><input type="password" name="Confpasswd" value="" required="1"></td>
            </tr>

            <tr>
                <td><b>name:</b></td>
                <td><input type="text" name="name" required="1" value=""></td>
            </tr>

            <tr>
                <td><b>lastname:</b></td>
                <td><input type="text" name="lastname" required="1" value=""></td>
            </tr>

            <tr>
                <td></td>
                <td align="center"><input type="submit" name="bSave" value="   Save   "></td>

            </tr>
        </table>
    </form>

    <input type="button" name="bCancel" value="   Cancel   ">
    <input type="button" name="bDelete" value="   Delete Account   ">

</div>
