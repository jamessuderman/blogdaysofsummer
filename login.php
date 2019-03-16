<!--
    Blog Site - Blog Days of Summer
    Version 1.0
    Login / Registration Module
    James Suderman
    3/3/2019
-->

<?php
    require_once "datasource.php";
    $datasource = new datasource();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $rowUser = $datasource->getUser($username);
    $posts = $datasource->getPosts();

    // If user is not present, redirect to login with nouser parameter to show error
    if($rowUser == null) {
        echo "Username not present in database";
        $conn->close();
        header("Location: index.php?message=nouser");
    }

    // If user is present, but password does not match, redirect to login with nopass parameter to show error
    if($rowUser['Password'] != $password) {
        echo "Password for {$rowUser['User_Name']} is incorrect";
        $conn->close();
        header("Location: index.php?message=nopass");
    }

    session_start();
    $_SESSION['username'] = $rowUser['User_Name'];
    $_SESSION['role'] = $rowUser['User_Role'];
    include "application.php";

    $conn->close();
?>