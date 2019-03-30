<!--
    Blog Site - Blog Days of Summer
    Version 1.3
    Update User
    James Suderman
    3/30/2019
-->

<?php

    require_once "datasource.php";
    $datasource = new datasource();

    $id = $_POST['id'];
    $password = $_POST['password'];

    if($_POST['admin']) {
        $role = "Admin";
    } else {
        $role = "User";
    }

    if($_POST['banned']) {
        $banned = 'Y';
    } else {
        $banned = 'N';
    }

    // Update the user in the database
    if ($datasource->updateUser($id, $password, $role, $banned) == TRUE) {
        $users = $datasource->getAllUsers();
        include "application.php";
    } else {
        echo "Problem updating user";
    }

?>