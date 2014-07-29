<h2 align="center">Войдите или зарегистрируйтесь</h2>

<div align="center" border=5>

    <form action="" method="post">
        <b>login:</b>
        <input type="text" name="login" size="15" required="true"><br>
        <b>password:</b>
        <input type="password" name="password" size="15" required="true"><br>
        <input type="submit" name="doGo" value="sign in"><br>
    </form>
   <?php print_r($_SERVER['SERVER_NAME']);?><br>
   <?php print_r($_SERVER['HTTP_HOST']); ?><br>

       <a href = "<?php print ("/register"); ?>">New user</a>
</div>




