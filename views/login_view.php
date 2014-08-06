<?php

if ($_SESSION['user'] !== 'Anon') {
    header('Refresh: 0; "forum" ');
}

?>


<div align="center">
    <a href="/register">New user</a> - <a href="/forum/Guest">Guest</a>
</div>


<h2 align="center">Войдите или зарегистрируйтесь</h2>

<div align="center" border=5>

    <form action="login" method="post">
        <table>
            <tr>
                <td align="right">
                    <!--      <b>login:</b> -->
                </td>
                <td>
                    <input type="text" placeholder="Name" name="login" size="15" required="true">
                </td>
            </tr>
            <tr>
                <td>
                    <!--     <b>password:</b> -->
                </td>
                <td>
                    <input type="password" placeholder="Password" name="password" size="15" required="true">
                </td>
            </tr>
            <tr align="center">
                <td></td>
                <td>
                    <input type="submit" name="doGo" value="sign in">
                </td>
            </tr>
        </table>
    </form>
    <hr width="30%">

    <br>

    <?php

    if (isset($_POST['doGo'])) Controller_Login::action_signIn();

    ?>

</div>




