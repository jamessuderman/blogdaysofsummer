<!--
    Blog Site - Blog Days of Summer
    Version 1.1
    Database class
    James Suderman
    3/15/2019
-->

<?php

class datasource
{
    function connectDB() {
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

        return $conn;
    }

    function getUser($username) {
        $conn = $this->connectDB();

        $sqlUsers = "SELECT * FROM users WHERE User_Name='$username'";
        $resultUsers = mysqli_query($conn, $sqlUsers) or die("Bad Query: $sqlUsers");
        $rowUser = mysqli_fetch_assoc($resultUsers);

        $conn->close();

        return $rowUser;
    }

    function getPosts() {
        $conn = $this->connectDB();

        $sqlPosts = "SELECT * FROM posts";
        $resultPosts = mysqli_query($conn, $sqlPosts) or die("Bad Query: $sqlPosts");
        $posts = array();
        while($rowPost = mysqli_fetch_assoc($resultPosts)) {
            array_push($posts, $rowPost);
        }

        $conn->close();

        return $posts;
    }

    function savePost($title, $body, $date) {
        session_start();

        $newTitle = addcslashes($title, "'");
        $newBody = addcslashes($body, "'");

        $conn = $this->connectDB();

        $sql = "INSERT INTO posts (Post_Title, Post_Body, Post_Date, Author) VALUES ('$newTitle', '$newBody', '$date', '{$_SESSION['username']}')";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return TRUE;
        } else {
            $conn->close();
            return FALSE;
        }
    }
}