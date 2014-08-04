<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
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
if ($_SESSION['user'] !== "Anon") {
    ?>
    <a href="/profile">Profile</a> - <a href="/forum/Guest">Logout</a>

<?php } else { ?>
    <a href="/register">New user</a> - <a href="/login">Log in</a>

<?php
}

echo "</div><br>";
Controller_Forum::show_pages();

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

<h3 align="center">You are logged in
    as <?php if (isset($_SESSION['user'])) print_r($_SESSION['user']); ?> !</h3>


<?php

if (isset($_GET['page'])) {
    Controller_Forum::show_all_posts($_GET['page']);
} else {
    Controller_Forum::show_all_posts(1);
}

Controller_Forum::show_pages();

if ($_SESSION['user'] !== "Anon") {

    ?>

    <form action="forum" method="post">
        <table align="center">
            <tr>
                <td align="right">
                    <b>Title :</b>
                </td>
                <td>
                    <input name="title" type="text" value="" required="1" size="20">
                </td>
            <tr>
                <td align="right">
                    <b>Message :</b>
                </td>
                <td>
                    <textarea name="message" cols="31" rows="3" draggable="false" required="1"></textarea>
                <td>
            </tr>

            <tr align="center">
                <td>
                </td>
                <td>
                    <input type="submit" name="doAddPost" value="Submit">
                </td>
            </tr>
        </table>
    </form>

<?php

} else {

    ?>
    <h3 align="center">Please register to post...</h3><?php
}











