<!--
    Blog Site - Blog Days of Summer
    Version 1.1
    Save Blog Post
    James Suderman
    3/15/2019
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
    if($datasource == NULL) {
        $datasource = new datasource();
    }

    $title = $_POST['title'];
    $body = $_POST['body'];
    $date = date('Y-m-d');
    $bannedWords = array("cuss", "swear", "profanity");

    // Check to see if each banned word in the array is contained in the body or the title, if so kick back with message
    foreach($bannedWords as $ban) {
        if(checkIfContains($ban, $body) && checkIfContains($ban, $title)) {
            header("Location: blog.php?message=banned");
            exit;
        }
    }

    if($_POST['id']) {
        // If editing, update the post in the database
        if ($datasource->updatePost($_POST['id'], $title, $body, $date) == TRUE) {
            $posts = $datasource->getPosts();
            include "application.php";
        } else {
            echo "Problem saving post to database";
        }
    } else {
        // Save the new post, then retrieve all the posts again to show on the blog list
        if ($datasource->savePost($title, $body, $date) == TRUE) {
            $posts = $datasource->getPosts();
            include "application.php";
        } else {
            echo "Problem saving post to database";
        }
    }
?>