<?php

/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 29.07.14
 * Time: 13:23
 */
Class Controller_Forum extends Controller
{
    function action_index()
    {
        $this->view->generate('forum_view.php', 'template_view.php');

    }

    function action_guest()
    {
        $_SESSION['user'] = "Anon";
        header('Refresh: 0; "/forum&page=1" ');
    }

    function action_add_post($author, $title, $message)
    {

        $mysqli = mysqli_get();
        $author = mysqli_real_escape_string($mysqli, $author);
        $title = mysqli_real_escape_string($mysqli, $title);
        $message = mysqli_real_escape_string($mysqli, $message);

        $sql = "INSERT INTO posts (pid, author, title, message) VALUES (NULL, '$author', '$title', '$message' ) ";
        mysqli_query($mysqli, $sql);

    }

    function empty_post()
    {

    }

    function show_all_posts($page = 1)
    {
        $mysqli = mysqli_get();
        $sql = " SELECT * FROM posts ORDER BY pid desc LIMIT " . ($page - 1) * DEFAULT_NUMBER_POSTS_ON_PAGE . ", " . DEFAULT_NUMBER_POSTS_ON_PAGE;
        $result = mysqli_query($mysqli, $sql);

        //JQuery Accordion

        echo "<div id='accordion' align='center'>";

        while ($row = mysqli_fetch_assoc($result)) {

            // echo $row['pid'];
            //          echo "<br>";
            echo "<h3 align='center'><b>Title: </b>" . $row['title'] . "<b> Author:</b>" . $row['author'] . "</h3>";
            echo "<div>";
            echo "<b>Message: </b>" . $row['message'];
            echo "<br><br>";

          //echo "<img src='img/disslike.jpg' id='" . $row['pid'] . "' alt='like' width='50'>";
            echo "<img onclick='clickLike()' src='img/like.jpg' class='like' id='" . $row['pid'] . "' alt='like' width='50'>";



            echo "<br><br><br>";
            if ($row['author'] == $_SESSION['user']) {
                echo "<form method='post' action='forum'>";
                echo "<input type='submit' name = 'delDo' value ='delete' >";
                echo "<input type='text' name = 'pid' value = " . $row['pid'] . " hidden>";
                echo "</form>";
            }

            echo "</div>";

        }
        echo "</div>";

    }

    function del_message($pid)
    {
        $mysqli = mysqli_get();
        $sql = " DELETE FROM posts WHERE pid = '$pid' ";
        mysqli_query($mysqli, $sql);

    }

    // return number of posts in base

    function get_pages_number()
    {
        $mysqli = mysqli_get();
        $sql = " SELECT COUNT(*) FROM posts ";
        $result = mysqli_query($mysqli, $sql);
        $numberOfRows = mysqli_fetch_row($result);

        return ceil($numberOfRows[0] / DEFAULT_NUMBER_POSTS_ON_PAGE);
    }


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
                echo "<td><b> 1 </b></td>";
                for ($i = 2; $i < 6; $i++) {
                    echo "<td><a href='forum&page=$i'>  $i  </a></td>";
                }
                break;
            }

            case 2:
            {
                echo "<td><a href='forum&page=1'>  1  </a></td>";
                echo "<td><b> 2 </b></td>";
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
                echo "<td><b> $numberOfPages </b></td>";
                break;
            }

            case ($numberOfPages - 1):
            {

                // echo "<td> $numberOfPages - 1 </td>";

                for ($i = ($numberOfPages - 4); $i < ($numberOfPages - 1); $i++) {
                    echo "<td><a href='forum&page=$i'>  $i  </a></td>";
                }

                echo "<td><b>" . ($numberOfPages - 1) . "</b></td>";
                echo "<td><a href='forum&page=$numberOfPages'>  $numberOfPages  </a></td>";
                break;
            }

            default:
                {
                echo "<td><a href='forum&page=" . ($currPage - 2) . "'>" . ($currPage - 2) . "</a></td>";
                echo "<td><a href='forum&page=" . ($currPage - 1) . "'>" . ($currPage - 1) . "</a></td>";
                echo "<td><b> $currPage </b></td>";
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
        echo "<br>";

    }

}

?>

