<!--
    Blog Site - Blog Days of Summer
    Version 1.3
    Delete User
    James Suderman
    3/30/2019
-->

<?php
    require_once "datasource.php";
    $datasource = new datasource();

    if($datasource->deleteUser($_GET['id']) == TRUE) {
        $posts = $datasource->getPosts();
        include "application.php";
    } else {
        echo "Problem deleting user";
    }
?>