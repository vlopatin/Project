<?php
/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 31.07.14
 * Time: 13:14
 */
function session_init ($user_login) {


   // session_start();

    $_SESSION['user'] = $user_login;
    $_SESSION['forumCurrPage'] = 1;

}

function UserId_get() {


}


?>