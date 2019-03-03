<!--
    Blog Site - Blog Days of Summer
    Version 1.0
    Login / Registration Module
    James Suderman
    3/3/2019
-->

<?php
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $email = $_POST['email'];
    $screenname = $_POST['screenName'];
    $pass = $_POST['pass'];

    $servername = "127.0.0.1:3306";
    $dbuser = "root";
    $dbpassword = "5041Jamon";
    $dbname = "blogsite";

    // Create connection
    $conn = new mysqli($servername, $dbuser, $dbpassword, $dbname);

    // If the connection fails show error
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create INSERT query
    $sql = "INSERT INTO users (User_Name, First_Name, Last_Name, Email, Password, User_Role) VALUES ('$screenname', '$firstname', '$lastname', '$email', '$pass', 'User')";

    // Run the query and redirect back to login page with updated parameter if successful, if not show error
    if ($conn->query($sql) === TRUE) {
        echo "$firstname $lastname inserted into database";
        $conn->close();
        header("Location: index.php?message=updated");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
