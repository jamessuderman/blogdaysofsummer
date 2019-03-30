<!--
    Blog Site - Blog Days of Summer
    Version 1.3
    Delete User
    James Suderman
    3/30/2019
-->

<?php
    session_start();
    $_SESSION['task'] = "admin";
    require_once "datasource.php";
    $datasource = new datasource();

    if($datasource->deleteUser($_GET['id']) == TRUE) {
        $users = $datasource->getAllUsers();
        include "application.php";
    } else {
        echo "Problem deleting user";
    }
?>