<!--
    Blog Site - Blog Days of Summer
    Version 1.2
    Cancel Post
    James Suderman
    3/20/2019
-->

<?php
    require_once "datasource.php";
    $datasource = new datasource();

    $posts = $datasource->getPosts();

    include "application.php";
?>