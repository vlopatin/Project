<?php
ini_set('display_errors', 1);
require_once 'bootstrap.php';
?>

<!--
<html>
 <head>

 </head>

 <body>

  <h1 align="center">WELCOME TO MY SIMPLE FORUM !</h1>
  <hr width="70%">
  <br>
  <h2 align="center">This is login page</h2>
  <br>
  <br>
  <br>
<?php

#print_r($_GET);
#phpinfo();
?>
    <div align="center" border=5>

        <form action="login1.php" method="post">
        <b>login:</b>
        <input type="text" name="login" size="15" required="true"><br>
        <b>password:</b>
        <input type="password" name="password" size="15" required="true"><br>
        <b>enter</b>
        <input type="submit" name="doGo" value="sign in"><br>
        </form>

        <b>not registered?</b>
        <a href="registration.php">new user</a><br>
        <b>anonymous</b>
        <a href="forum.html">enter<a><br>
    </div>
    </body>



</html>





<?php
#phpinfo();
?>