<!--
    Blog Site - Blog Days of Summer
    Version 1.2
    Delete Post
    James Suderman
    3/20/2019
-->

<?php
    require_once "datasource.php";
    $datasource = new datasource();

    if($datasource->deletePost($_GET['id']) == TRUE) {
        $posts = $datasource->getPosts();
        include "application.php";
    } else {
        echo "Problem deleting post";
    }
?>