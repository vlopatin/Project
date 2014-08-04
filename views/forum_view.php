<?php
/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 29.07.14
 * Time: 13:25
 */
?>

<div align="center">

<?php
    // Menu
if (intval($_GET['page']) <=0 || $_GET['page'] > Controller_Forum::get_pages_number()) $_GET['page']=1;



if ($_SESSION['user'] !== "Anon") { ?>
    <a href="/profile">Profile</a> - <a href="/forum/Guest">Logout</a>
</div>



<?php } else { ?>
    <a href="/register">New user</a> - <a href="/login">Log in</a>

<?php
}

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
<hr width='25%'>


<!-- <p align="center">Total posts: <?php //  print (Controller_Forum::get_posts_number()*); ?></p> -->


<?php

if (isset($_GET['page'])) {
    //$_SESSION['page'] = $_POST['page'];
    Controller_Forum::show_all_posts($_GET['page']);

    // print_r($_POST['page']);

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
                    <!--      <input type="button" name="doEditPost" value="Edit">
                              <input type="button" name="doDelPost" value="Delete"> -->
                </td>
            </tr>
        </table>
    </form>

<?php

} else {

?>
    <h3 align="center">Please register to post...</h3><?php }











