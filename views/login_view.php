<?php


?>
<div align="center">
<a href ="/register">New user</a> - <a href ="/forum/Guest">Guest</a>
    </div>



<h2 align="center">Войдите или зарегистрируйтесь</h2>

<div align="center" border=5>

    <form action="login" method="post">
        <b>login:</b>
        <input type="text" name="login" size="15" value="<?php if ( isset($_SESSION['user']) && $_SESSION['user'] !== "Anon" ) print ($_SESSION['user'])?>" required="true"><br><br>
        <b>password:</b>
        <input type="password" name="password" size="15" required="true"><br><br>
        <input type="submit" name="doGo" value="sign in"><br><br>
    </form>


<br>
    <?php

    if (isset($_POST['doGo'])) Controller_Login::action_signIn();

    ?>

</div>




