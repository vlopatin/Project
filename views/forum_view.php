<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
    <!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script> -->
    <script src="JScript/jquery-2.1.1.js"></script>
    <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src="JScript/script.js"></script>
    <!--    <script src="script_for.js"></script>-->
    <!--<link rel="stylesheet" href="/resources/demos/style.css"> -->
    <script>
        $(function () {
            $("#accordion").accordion();
        });
    </script>
</head>

<?php



if (!isset($_GET['page'])) {
    $_GET['page'] = 1;
} elseif (intval($_GET['page']) <= 0 || $_GET['page'] > Controller_Forum::get_pages_number()) {
    $_GET['page'] = 1;
}
echo "<div align='center'>";
echo "<div align='center' style='background:#CCFFCC'>";

if (isset($_SESSION['userId'])) {
    ?>

    <!--    -------------------MENU-->
    <a href="/profile">Profile</a> - <a href="/forum/Guest">Log out</a>

<?php } else { ?>
    <a href="/register">New user</a> - <a href="/login">Log in</a>

    </div>
<?php
}
//------------------------------------

echo "</div><br>";

//  -----------------------------------SHOW POSTS FUNCTION

function show_posts_view($page = 1)
{
    $result = Controller_Forum::get_posts($page);

    isset($_SESSION['userId']) ? $sesUserId = $_SESSION['userId'] : $sesUserId = 'Guest';


    //JQuery Accordion
    echo "<div id='accordion' align='center' style='background:#99FF99; width:40%; margin-left: auto; margin-right: auto; '>";

    while ($row = mysqli_fetch_assoc($result)) {

        echo "<h3 align='center'>Title: " . $row['title'] . ", Author: " . get_user_login($row['authorId'])  . "</h3>";
        echo '<div class="user-' . $sesUserId . '" id="pid-' . $row['pid'] . '"' . '"' . '>';

        echo "<span border: 2px solid red>";
        echo $row['message'];

        echo "</span>";
        echo "<br>";

        echo '<div align="right" style="float:right; width: 50%;">';


        if ($sesUserId !== $row['authorId'] && isset($_SESSION['userId'])) {

            if (Model_forum::is_post_liked($sesUserId, $row['pid'])) {
                echo "<img src='img/like2.jpg' class='unlike' alt='like' width='30'>";
            } else {
                echo "<img src='img/like2.jpg' class='like' alt='like' width='30'>";
            }
        } else {
            echo "<img src='img/like2.jpg' class='likeauthor' alt='like' width='30'>";
        }

        echo "<span class='status' style='font-size: 30px; color:#006600;'>";
        echo " " . Model_Forum::get_likes_number($row['pid']);
        echo "  </span>";
        echo "</div>";

        if ($row['authorId'] == $sesUserId) {
            echo "<div  style='font-size: 20px; clear: both; float:right; '>";
            echo '<span class="delete" style="font-size: 20px; color:#FF3366;">Delete</span>';
            echo "  </div>";
        }
        echo "</div>";
    }
    echo "</div>";
}


//----------------------------------------------


// -------------------------------------------- SHOW PAGES FUNCTION

function show_pages()
{

    $numberOfPages = Controller_Forum::get_pages_number();
    $currPage = $_GET['page'];

    echo "<table align='center'><tr>";

    if ($_GET['page'] > 1) {
        echo "<td><a href='forum&page=1'> first </a></td>";
        echo "<td><a href='forum&page=" . ($_GET['page'] - 1) . " '> prev </a></td>";
        echo "<td>...</td>";
    }

    switch ($currPage) {
        case 1:
        {
            echo "<td style='color: #006600; font-size: 20px'><b> 1 </b></td>";
            for ($i = 2; $i < 6; $i++) {
                echo "<td><a href='forum&page=$i'>  $i  </a></td>";
            }
            break;
        }

        case 2:
        {
            echo "<td><a href='forum&page=1'>  1  </a></td>";
            echo "<td style='color: #006600; font-size: 20px'><b> 2 </b></td>";
            for ($i = 3; $i < 6; $i++) {
                echo "<td><a href='forum&page=$i'>  $i  </a></td>";
            }
            break;
        }

        case $numberOfPages:
        {
            for ($i = ($numberOfPages - 4); $i < $numberOfPages; $i++) {
                echo "<td><a href='forum&page=$i'>  $i  </a></td>";
            }
            echo "<td style='color: #006600; font-size: 20px' ><b> $numberOfPages </b></td>";
            break;
        }

        case ($numberOfPages - 1):
        {

            for ($i = ($numberOfPages - 4); $i < ($numberOfPages - 1); $i++) {
                echo "<td><a href='forum&page=$i'>  $i  </a></td>";
            }

            echo "<td style='color: #006600; font-size: 20px'><b>" . ($numberOfPages - 1) . "</b></td>";
            echo "<td><a href='forum&page=$numberOfPages'>  $numberOfPages  </a></td>";
            break;
        }

        default:
            {
            echo "<td><a href='forum&page=" . ($currPage - 2) . "'>" . ($currPage - 2) . "</a></td>";
            echo "<td><a href='forum&page=" . ($currPage - 1) . "'>" . ($currPage - 1) . "</a></td>";
            echo "<td style='color: #006600; font-size: 20px'><b> $currPage </b></td>";
            echo "<td><a href='forum&page=" . ($currPage + 1) . "'>" . ($currPage + 1) . "</a></td>";
            echo "<td><a href='forum&page=" . ($currPage + 2) . "'>" . ($currPage + 2) . "</a></td>";

            }

    }

    if ($_GET['page'] < $numberOfPages) {
        echo "<td>...</td>";
        echo "<td><a href='forum&page=" . ($_GET['page'] + 1) . " '> next </a></td>";
        echo "<td><a href='forum&page=$numberOfPages'> last </a></td>";
    }

    echo "</tr></table>";
    echo "</div>";
}

// ------------------------------------------------------


//    -------------------FORM ACTIONS
// delete message
if (isset($_POST['delDo'])) {
    Controller_Forum::del_message($_POST['pid']);
    $_POST['delDo'] = NULL;
}
// add message
if (isset($_POST['doAddPost'])) {
    Controller_Forum::action_add_post($_SESSION['userId'], $_POST['title'], $_POST['message']);

}
?>

<!---------------------------->


<h3 align="center" style="color: #006600; font-size: 20px">You are logged in
    as <?php isset($_SESSION['userId']) ? print_r(get_user_login($_SESSION['userId'])) : print_r('Guest');


    ?> !</h3>
<br>
<div align=center>

    <?php show_pages(); ?>

</div>

<?php


isset($_GET['page']) ? show_posts_view($_GET['page']) : show_posts_view(1);

echo "<div align=center>";

show_pages();

echo "<br></div>";

if (isset($_SESSION['userId'])) {

    ?>


    <!-------------------------------------------    ADD POST FORM-->



    <div align=center style="background:#99FF99; width:15%; margin-left: auto; margin-right: auto;">
        <br>

        <h3 align="center" style="color:#006600">Add post</h3>
        <br>

        <form action="forum" method="post">
            <input name="title" type="text" style="width:80%" placeholder="Title" value="" required="1"
                   size="20"> </td>
            <textarea name="message" placeholder="Message" style="width:80%" cols="31" rows="3" draggable="false"
                      required="1"></textarea>
            <input type="submit" name="doAddPost" style="width:80%" value="Submit">
        </form>
        <br><br>
    </div>

<?php

} else {

    ?>
    <h3 align="center">Please register to add post...</h3><?php

} ?>











