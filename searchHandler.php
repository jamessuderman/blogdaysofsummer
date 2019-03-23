<!--
    Blog Site - Blog Days of Summer
    Version 1.2
    Search Blog Post
    James Suderman
    3/25/2019
-->

<?php
    require_once "datasource.php";
    $datasource = new datasource();

    $param = $_POST['search'];          // Value of the search field
    $constraint = $_POST['category'];   // What to constrain the search parameter to

    $posts = $datasource->searchPost($param, $constraint);

    if($posts != NULL) {
        include 'application.php';
    } else {
        echo "Bad Search";
    }
?>