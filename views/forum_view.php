<?php
/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 29.07.14
 * Time: 13:25
 */
?>
<div align="center">
 <!--   <a href ="/register">New user</a> - <a href ="/forum/Guest">Guest</a> -->




<?php
if ($_SESSION['user'] !== "Anon") { ?>
    <a href ="/profile">Profile</a> - <a href ="/forum/Guest">Logout</a>

</div>

<?php } else { ?>
    <a href ="/register">New user</a> - <a href ="/login">Log in</a>

<?php }?>

<h3 align="center">Hello, <?php if (isset($_SESSION['user'])) print_r($_SESSION['user']); else echo "dude"; ?> !</h3>
<hr width='25%'>

<?php

if (isset($_POST['delDo'])) {

    Controller_Forum::del_message($_POST['pid']);
    $_POST['delDo'] = NULL;
}

if (isset($_POST['doAddPost'])) {
    Controller_Forum::action_add_post($_SESSION['user'], $_POST['title'], $_POST['message']);
    }
?>

<p align="center">Total posts: <?php print (Controller_Forum::get_posts_number()); ?></p>




<?php

if (isset($_POST['page'])) {

    $_SESSION['page'] = $_POST['page'];

    Controller_Forum::show_all_posts($_POST['page']);
  //  print_r($_POST['page']);

} else {
Controller_Forum::show_all_posts();}

//print_r($_POST['page']);

Controller_Forum::show_pages();


?>















<?php

if ($_SESSION['user'] !== "Anon") {

?>

<form action = "forum" method = "post">
<table align = "center">
    <tr>
        <td align = "right">
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
                <textarea name="message" cols="31" rows="3" draggable="false" required="1" ></textarea>
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
} else { ?>
        <h3 align="center">Please register to post...</h3><?php } ?>

<?php




?>








