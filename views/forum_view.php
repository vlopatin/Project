<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
    <!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script> -->
    <script src="jquery-2.1.1.js"></script>
    <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src="script.js"></script>
<!--    <script src="script_for.js"></script>-->
    <!--<link rel="stylesheet" href="/resources/demos/style.css"> -->
    <script>
        $(function () {
            $("#accordion").accordion();
        });
    </script>
</head>

<?php

// Menu

if (!isset($_GET['page'])) {
    $_GET['page'] = 1;
} elseif (intval($_GET['page']) <= 0 || $_GET['page'] > Controller_Forum::get_pages_number()) {
    $_GET['page'] = 1;
}
echo "<div align='center'>";
echo "<div align='center' style='background:#CCFFCC'>";
if ($_SESSION['user'] !== "Anon") {
    ?>


    <a href="/profile">Profile</a> - <a href="/forum/Guest">Logout</a>

<?php } else { ?>
    <a href="/register">New user</a> - <a href="/login">Log in</a>

    </div>
<?php
}

echo "</div><br>";

// delete message
if (isset($_POST['delDo'])) {
    Controller_Forum::del_message($_POST['pid']);
    $_POST['delDo'] = NULL;
}
// add message
if (isset($_POST['doAddPost'])) {
    Controller_Forum::action_add_post($_SESSION['user'], $_POST['title'], $_POST['message']);

}
?>

<h3 align="center">You are logged in as <?php if (isset($_SESSION['user'])) print_r($_SESSION['user']); ?> !</h3>
<br>
<div align=center>
    <?php Controller_Forum::show_pages(); ?>
</div>

<?php

if (isset($_GET['page'])) {
    Controller_Forum::show_all_posts($_GET['page']);
} else {
    Controller_Forum::show_all_posts(1);
}
echo "<div align=center>";
Controller_Forum::show_pages();
echo "<br></div>";

if ($_SESSION['user'] !== "Anon") {

    ?>

    <div align=center style="background:#99FF99; width:15%; margin-left: auto; margin-right: auto;">
        <br>

        <h3 align="center" style="color:#006600">Add post</h3>
        <br>

        <form action="forum" method="post">
            <input name="title" type="text" style="width:80%" placeholder="Title" value="" required="1"
                   size="20"> </td>
            <textarea name="message" placeholder="Message" style="width:80%" cols="31" rows="3" draggable="false"
                      required="1"></textarea>
            <input type="submit" name="doAddPost" style="width:80%" value="Submit">
        </form>
        <br><br>
    </div>

<?php

} else {

    ?>
    <h3 align="center">Please register to add post...</h3><?php

} ?>











