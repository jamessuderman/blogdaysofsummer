<!--
    Blog Site - Blog Days of Summer
    Version 1.1
    Save Blog Post
    James Suderman
    3/15/2019

    This handler will show a post or create a new one
-->

<?php
    function checkIfContains($toTest, $toCheck)
    {
        // Check if length of either string is zero for validation purposes
        if(strlen($toTest) == 0 || strlen($toCheck) == 0)
        {
            return false;
        }
        $exploded = explode(" ", $toCheck);
        foreach($exploded as $word)
        {
            if($word == $toTest)
            {
                // Found a match, return true!
                return true;
            }
        }
        // None matched, return false
        return false;
    }

    require "datasource.php";
    $datasource = new datasource();

    session_start();

    $title = $_POST['title'];
    $body = $_POST['body'];
    $category = $_POST['category'];
    $date = date('Y-m-d');
    $bannedWords = array("cuss", "swear", "profanity");
    $stars = 0;

    if($_POST['comment']) {
        $comment = $_POST['comment'];
    }

    if($_POST['star1']) {
        $stars = 1;
    } elseif ($_POST['star2']) {
        $stars = 2;
    } elseif ($_POST['star3']) {
        $stars = 3;
    } elseif ($_POST['star4']) {
        $stars = 4;
    } elseif ($_POST['star5']) {
        $stars = 5;
    }

    // Check to see if each banned word in the array is contained in the body or the title, if so kick back with message
    foreach($bannedWords as $ban) {
        if(checkIfContains($ban, $body) && checkIfContains($ban, $title)) {
            header("Location: blog.php?message=banned");
            exit;
        }
    }

    if(!$_POST['mode']) {
        if ($_POST['id']) {
            // If editing, update the post in the database
            if ($datasource->updatePost($_POST['id'], $title, $body, $category, $date) == TRUE) {
            } else {
                echo "Problem saving post to database";
            }
        } else {
            // Save the new post, then retrieve all the posts again to show on the blog list
            if ($datasource->savePost($title, $body, $category, $date) == TRUE) {
            } else {
                echo "Problem saving post to database";
            }
        }
    } else {
        // Save rating first to use to save the comment
        $datasource->saveRating($_POST['id'], $_SESSION['username'], $stars);
        $datasource->saveComment($_POST['id'], $_POST['comment'], $_SESSION['username']);
    }

    $posts = $datasource->getPosts();
    include "application.php";
?>