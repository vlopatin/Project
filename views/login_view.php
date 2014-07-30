<h2 align="center">Войдите или зарегистрируйтесь</h2>

<div align="center" border=5>

    <form action="" method="post">
        <b>login:</b>
        <input type="text" name="login" size="15" required="true"><br><br>
        <b>password:</b>
        <input type="password" name="password" size="15" required="true"><br><br>
        <input type="submit" name="doGo" value="sign in"><br><br>
    </form>
       <a href ="/register">New user</a><br><br>
       <a href ="/forum">Guest</a>
<br>
    <?php if (isset($_POST['doGo'])) Controller_Login::action_signIn();
    ?>

</div>




