<?php

if ($_SESSION['user'] !== 'Anon') {
    header('Refresh: 0; "forum" ');
}

?>

<div align="center" style="background:#CCFFCC">
	<a href="/register">New user</a> - <a href="/forum/Guest">Guest</a>
</div>

<div align=center style="background:#99FF99; width:200px; margin-left: auto; margin-right: auto; position:relative; top:150px;">
    <h3 align="center" style="color:#006600">Sign-in</h3>
   	<form action="login" method="post">
        <input type="text" style="width:150px" placeholder="Name" name="login" required="true">
        <input style="width:150px" type="password" placeholder="Password" name="password" required="true">
        <input style="width:150px" type="submit" name="doGo" value="sign in">
	</form>
    <br>

<?php

if (isset($_POST['doGo'])) Controller_Login::action_signIn();

?>

</div>




