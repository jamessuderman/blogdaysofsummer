<!--
    Blog Site - Blog Days of Summer
    Version 1.0
    Login / Registration Module
    James Suderman
    3/3/2019
-->

<?php
    $username = $_POST['username'];
    $password = $_POST['password'];

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

    // Create SELECT query
    $sql = "SELECT * FROM users WHERE User_Name='$username'";

    // Store the results from the SELECT
    $result = mysqli_query($conn, $sql) or die("Bad Query: $sql");

    // Get the first row from the result
    $row = mysqli_fetch_assoc($result);

    // If user is not present, redirect to login with nouser parameter to show error
    if($row == null) {
        echo "Username not present in database";
        $conn->close();
        header("Location: index.php?message=nouser");
    }

    // If user is present, but password does not match, redirect to login with nopass parameter to show error
    if($row['Password'] != $password) {
        echo "Password for {$row['User_Name']} is incorrect";
        $conn->close();
        header("Location: index.php?message=nopass");
    }

    $conn->close();

    // If no errors simply show that the user was logged in
    echo "{$row['User_Name']} was logged in";
?>