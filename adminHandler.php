<!--
    Blog Site - Blog Days of Summer
    Version 1.3
    Handle the admin of users
    James Suderman
    3/330/2019
-->

<?php
    require_once "datasource.php";
    $datasource = new datasource();

    // Get the users for the admin paage
    $users = $datasource->getAllUsers();

    session_start();
    // Change the task in session to admin so that the application displays the right content
    $_SESSION['task'] = "admin";

    include "application.php";

?>