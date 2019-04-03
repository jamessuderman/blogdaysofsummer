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

    function getUserById($id) {
        $conn = $this->connectDB();

        $sqlUsers = "SELECT * FROM users WHERE User_Id='$id'";
        $resultUsers = mysqli_query($conn, $sqlUsers) or die("Bad Query: $sqlUsers");
        $rowUser = mysqli_fetch_assoc($resultUsers);

        $conn->close();

        return $rowUser;
    }

    function getAllUsers() {
        $conn = $this->connectDB();

        $sqlCategories = "SELECT * FROM Users WHERE User_Deleted = 'N'";
        $resultUsers = mysqli_query($conn, $sqlCategories) or die("Bad Query: $sqlCategories");
        $users = array();
        while($rowUsers = mysqli_fetch_assoc($resultUsers)) {
            array_push($users, $rowUsers);
        }

        $conn->close();

        return $users;
    }

    function saveUser($screenname, $firstname, $lastname, $email, $pass) {
        $conn = $this->connectDB();

        // Create INSERT query
        $sql = "INSERT INTO users (User_Name, First_Name, Last_Name, Email, Password, User_Role) VALUES ('$screenname', '$firstname', '$lastname', '$email', '$pass', 'User')";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return TRUE;
        } else {
            $conn->close();
            return FALSE;
        }
    }

    function updateUser($id, $password, $role, $banned) {
        $conn = $this->connectDB();

        $sql = "UPDATE Users SET Password = '$password', User_Role = '$role', User_Banned = '$banned' WHERE User_Id = '$id'";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return TRUE;
        } else {
            $conn->close();
            return FALSE;
        }
    }

    function deleteUser($id) {
        $conn = $this->connectDB();

        $sql = "UPDATE Users SET User_Deleted = 'Y' WHERE User_Id = '$id'";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return TRUE;
        } else {
            $conn->close();
            return FALSE;
        }
    }

    function getCategories() {
        $conn = $this->connectDB();

        $sqlCategories = "SELECT * FROM Categories WHERE Active_Flag = 'Y'";
        $resultPosts = mysqli_query($conn, $sqlCategories) or die("Bad Query: $sqlCategories");
        $categories = array();
        while($rowPost = mysqli_fetch_assoc($resultPosts)) {
            array_push($categories, $rowPost);
        }

        $conn->close();

        return $categories;
    }

    function getPosts() {
        $conn = $this->connectDB();

        $sqlPosts = "SELECT Posts.Post_Id, Posts.Post_Title, Posts.Post_Body, Categories.Category_Name, Posts.Author, Posts.Post_Date 
                      FROM Posts INNER JOIN Categories ON Posts.Category_Id = Categories.Category_Id WHERE Posts.Deleted_Flag = 'N' ";
        $resultPosts = mysqli_query($conn, $sqlPosts) or die("Bad Query: $sqlPosts");
        $posts = array();
        while($rowPost = mysqli_fetch_assoc($resultPosts)) {
            array_push($posts, $rowPost);
        }

        $conn->close();

        return $posts;
    }

    function savePost($title, $body, $category, $date) {
        session_start();

        $newTitle = addcslashes($title, "'");
        $newBody = addcslashes($body, "'");

        $conn = $this->connectDB();

        $sql = "INSERT INTO Posts (Posts.Post_Title, Posts.Category_Id, Posts.Post_Body, Posts.Post_Date, Author) 
                VALUES ('$newTitle', (SELECT Categories.Category_Id FROM Categories WHERE Category_Name = '$category'), '$newBody', '$date', '{$_SESSION['username']}')";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return TRUE;
        } else {
            $conn->close();
            return FALSE;
        }
    }

    function updatePost($id, $title, $body, $category, $date) {
        session_start();

        $newTitle = addcslashes($title, "'");
        $newBody = addcslashes($body, "'");

        $conn = $this->connectDB();

        $sql = "UPDATE Posts SET Post_Title = '$newTitle', Category_Id = (SELECT Categories.Category_Id 
                FROM Categories WHERE Category_Name = '$category'), Post_Body = '$newBody', Updated_Date = '$date', Updated_Author = '{$_SESSION['username']}' 
                WHERE Post_Id = '$id'";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return TRUE;
        } else {
            $conn->close();
            return FALSE;
        }
    }

    function deletePost($id) {
        $conn = $this->connectDB();

        $sql = "UPDATE Posts SET Deleted_Flag = 'Y' WHERE Post_Id = '$id'";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return TRUE;
        } else {
            $conn->close();
            return FALSE;
        }
    }

    function searchPost($param, $constraint) {
        $conn = $this->connectDB();

        switch($constraint) {
            case 'Author':
                $sqlPosts = "SELECT Posts.Post_Id, Posts.Post_Title, Posts.Post_Body, Categories.Category_Name, Posts.Author, Posts.Post_Date 
                              FROM Posts INNER JOIN Categories ON Posts.Category_Id = Categories.Category_Id 
                              WHERE Posts.Author = '$param' AND Posts.Deleted_Flag = 'N' ";
                break;
            case 'Title':
                $sqlPosts = "SELECT Posts.Post_Id, Posts.Post_Title, Posts.Post_Body, Categories.Category_Name, Posts.Author, Posts.Post_Date 
                              FROM Posts INNER JOIN Categories ON Posts.Category_Id = Categories.Category_Id 
                              WHERE Post_Title = '$param' AND Posts.Deleted_Flag = 'N' ";
                break;
            case 'Category':
                $sqlPosts = "SELECT Posts.Post_Id, Posts.Post_Title, Posts.Post_Body, Categories.Category_Name, Posts.Author, Posts.Post_Date 
                              FROM Posts INNER JOIN Categories ON Posts.Category_Id = Categories.Category_Id 
                              WHERE Posts.Category_Id = (SELECT Categories.Category_Id FROM Categories WHERE Category_Name = '$param') AND Posts.Deleted_Flag = 'N' ";
                break;
        }

        $resultPosts = mysqli_query($conn, $sqlPosts) or die("Bad Query: $sqlPosts");
        $posts = array();
        while($rowPost = mysqli_fetch_assoc($resultPosts)) {
            array_push($posts, $rowPost);
        }

        $conn->close();

        return $posts;
    }

    function getComments($id) {
        $conn = $this->connectDB();

        $sqlComments= "SELECT Comments.Body, Users.User_Name, Ratings.Stars FROM Comments INNER JOIN Users ON Comments.Author_Id = Users.User_Id 
                        INNER JOIN Ratings ON Ratings.Post_Id = Comments.Post_Id AND Ratings.Author_Id = Users.User_Id WHERE Comments.Post_Id = '$id'";
        $resultComments = mysqli_query($conn, $sqlComments) or die("Bad Query: $sqlComments");
        $comments = array();
        while($rowComments = mysqli_fetch_assoc($resultComments)) {
            array_push($comments, $rowComments);
        }

        $conn->close();

        return $comments;
    }

    function saveComment($id, $body, $author) {
        $conn = $this->connectDB();

        // Create INSERT query
        $sql = "INSERT INTO Comments (Body, Author_Id, Rating_Id, Post_Id) VALUES ('$body', 
                (SELECT Users.User_Id FROM Users WHERE Users.User_Name = '$author'), 
                (SELECT Ratings.Rating_Id FROM Ratings WHERE Ratings.Post_Id = '$id' AND Ratings.Author_Id =  
                (SELECT Users.User_Id FROM Users WHERE Users.User_Name = '$author')), '$id')";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return TRUE;
        } else {
            $conn->close();
            return FALSE;
        }
    }

    function saveRating($id, $author, $stars) {
        $conn = $this->connectDB();

        // Create INSERT query
        $sql = "INSERT INTO Ratings (Post_Id, Author_Id, Stars) 
                VALUES ('$id', (SELECT Users.User_Id FROM Users WHERE Users.User_Name = '$author'),'$stars')";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return TRUE;
        } else {
            $conn->close();
            return FALSE;
        }
    }
}