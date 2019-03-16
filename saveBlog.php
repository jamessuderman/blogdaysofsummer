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

    foreach($bannedWords as $ban) {
        if(checkIfContains($ban, $body)) {
            header("Location: blog.php?message=banned");
            exit;
        }
    }

    if ($datasource->savePost($title, $body, $date) == TRUE) {
        $posts = $datasource->getPosts();
        include "application.php";
    } else {
        echo "Problem saving post to database";
    }
?>