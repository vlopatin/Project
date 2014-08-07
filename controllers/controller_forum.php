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
        $author = mysqli_real_escape_string($mysqli, $author);
        $title = mysqli_real_escape_string($mysqli, $title);
        $message = mysqli_real_escape_string($mysqli, $message);

        Model_Forum::add_new_post($author, $title, $message);
    }

    function empty_post()
    {
    }

    function show_all_posts($page = 1)
    {
        $result = Model_Forum::get_posts($page);

        $sesUser = $_SESSION['user'];

        //JQuery Accordion
        echo "<div id='accordion' align='center'>";

        while ($row = mysqli_fetch_assoc($result)) {

            echo "<h3 align='center'><b>Title: </b>" . $row['title'] . "<b> Author:</b>" . $row['author'] . "</h3>";

            echo '<div class="user-' . $sesUser . '" id="pid-' . $row['pid'] . '"  >';

            echo "<b>Message: </b>" . $row['message'];
            echo "<br><br>";


            echo "<span class='status'>";
            echo Model_Forum::get_likes_number($row['pid']);
            echo "  </span>";

            // if post is not liked by current user - show like_button
            if ($sesUser !== $row['author'] && $sesUser !== 'Anon' ) {
                //if (($sesUser !== $row['author'])) {
                if (Model_forum::is_post_liked($sesUser, $row['pid'])) {
                    echo "<img src='img/like.jpg' class='unlike' alt='like' width='50'>";
                } else {
                    echo "<img src='img/like.jpg' class='like' alt='like' width='50'>";
                }
            } else {
                echo "<img src='img/like.jpg' class='likeauthor' alt='like' width='50'>";
            }

            //   echo "<div class='status'>";
           //  echo "Total likes: " . Model_Forum::get_likes_number($row['pid']);

            echo "<br><br>";

            if ($row['author'] == $sesUser) {
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
        Model_Forum::delete_post($pid);
    }

    function get_pages_number()
    {
        $result = Model_Forum::get_posts_number();
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

