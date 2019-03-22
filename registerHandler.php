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

    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $email = $_POST['email'];
    $screenname = $_POST['screenName'];
    $pass = $_POST['pass'];

    // All fields must be filled in
    if($firstname != null && $lastname != null && $email != null && $screenname != null && $pass != null) {
        // Run the query and redirect back to login page with updated parameter if successful, if not show error
        if ($datasource->saveUser($screenname, $firstname, $lastname, $email, $pass)== TRUE) {
            echo "$firstname $lastname inserted into database";
            header("Location: index.php?message=updated");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "All fields are required";
    }
?>
