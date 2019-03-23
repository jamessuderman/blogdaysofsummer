<!--
    Blog Site - Blog Days of Summer
    Version 1.2
    Get All Blog Posts
    James Suderman
    3/25/2019
-->

<?php
    require_once "datasource.php";
    $datasource = new datasource();

    $posts = $datasource->getPosts();

    include "application.php";

?>