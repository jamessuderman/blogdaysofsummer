<?php

    require_once "datasource.php";
    $datasource = new datasource();

    $users = $datasource->getAllUsers();

    session_start();
    $_SESSION['task'] = "admin";

    include "application.php";

?>