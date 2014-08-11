<?php

if (isset($_SESSION['userId'])) {
    header('Refresh: 0; "forum" ');
}

?>

<div align="center" style="background:#CCFFCC">
    <a href="/register">New user</a> - <a href="/forum/Guest">Guest</a>
</div>

<div align=center
     style="background:#99FF99; width:16%; margin-left: auto; margin-right: auto; position:absolute; top:20%; left:42%">
    <br>

    <h3 align="center" style="color:#006600">Sign-in</h3>
    <br>
    <img src='img/indus.jpg' class='unlike' alt='like' width='100'>
    <br>
    <br>

    <form action="login" method="post">
        <input type="text" style="width:70%" placeholder="Name" name="login" required="true">
        <input style="width:70%" type="password" placeholder="Password" name="password" required="true">
        <input style="width:70%" type="submit" name="doGo" value="sign in">
    </form>
    <br>
    <br>

    <?php

    if (isset($_POST['doGo'])) Controller_Login::action_signIn();

    ?>

</div>




