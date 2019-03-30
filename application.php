<!--
    Blog Site - Blog Days of Summer
    Version 1.1
    Main Application
    James Suderman
    3/14/2019
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="application.css"/>

    <title>Blog Days of Summer</title>
</head>
<body>

    <?php
        session_start();
        include "_header.php";

        if($_SESSION['task'] == "blogs") {
            include "_blogs.php";
        } elseif ($_SESSION['task'] == "admin") {
            include "_admin.php";
        }
    ?>

</body>
</html>