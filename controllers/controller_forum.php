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

    function action_guest() {
        $_SESSION['user'] = "Anon";
        header( 'Refresh: 0; "/forum" ' );
    }

    function action_add_post($author, $title, $message) {

        $mysqli = mysqli_get();
        $author = mysqli_real_escape_string($mysqli, $author);
        $title = mysqli_real_escape_string($mysqli, $title);
        $message = mysqli_real_escape_string($mysqli, $message);

        $sql = "INSERT INTO posts (pid, author, title, message) VALUES (NULL, '$author', '$title', '$message' ) ";
        mysqli_query($mysqli, $sql);
    }

    function empty_post() {

    }

    function show_all_posts() {
       $mysqli = mysqli_get();
       $sql = " SELECT * FROM posts ";
       $result = mysqli_query($mysqli, $sql);

        while (($row = mysqli_fetch_assoc($result)))
            {
         echo "<div align='center'>";

           echo "<b>Author: </b>" . $row['author']. "<br>";
           echo "<b>title: </b>" . $row['title']. "<br>";
           echo "<b>Post: </b>" . $row['message']. "<br>";


           if ($row['author'] == $_SESSION['user']) {
               echo "<form method='post' action='forum'>";
               echo "<input type='submit' name = 'delDo' value ='delete' >";
               echo "<input type='text' name = 'pid' value = " . $row['pid'] . " hidden>";
               echo "</form>";
           }



                echo "<hr width='25%'>";

         echo "</div>";

           //print ($row['title']);

            }

     }

    function del_message ($pid) {
        $mysqli = mysqli_get();
        $sql = " DELETE FROM posts WHERE pid = '$pid' ";
        mysqli_query($mysqli, $sql);

    }

}


?>

