<!--
    Blog Site - Blog Days of Summer
    Version 1.3
    Edit User
    James Suderman
    3/30/2019
-->

<?php
    session_start();
    $_SESSION['task'] = "admin";
    require 'datasource.php';
    $datasource = new datasource();
    $user = $datasource->getUserById($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="application.css"/>

    <title>Edit User</title>
</head>
<body>

<?php
    include "_header.php";
?>

<div class="container">
    <div class="login center largeMarginTop spaceAfter">
        <form id="userform" method="post" action="updateUserHandler.php">
            <div>
                <div class="spaceAfter center">
                    <p class="spaceRight lightText">Name: <?php echo $user['First_Name'] . " " .  $user['Last_Name']?></p>
                    <p class="spaceRight lightText">Email: <?php echo $user['Email'] ?></p>
                    <p class="spaceRight lightText">Username: <?php echo $user['User_Name'] ?></p>
                    <label for="password" class="spaceRight lightText">Password: </label>
                    <input type='text' id='password' name='password' class='form-control spaceRight loginFormControl' value=<?php echo "{$user['Password']}"; ?> />
                </div>
                <div>
                    <?php
                        echo "<label for='admin' class='spaceRight lightText' style='margin-right: 29px;'>Admin</label>";
                        if($user['User_Role'] == "Admin") {
                            echo "<input id='admin' name='admin' type='checkbox' class='form-check-input' value='N' checked />";
                        } else {
                            echo "<input id='admin' name='admin' type='checkbox' class='form-check-input' value='Y' />";
                        }
                    ?>
                </div>
                <div class="spaceAfter">
                    <?php
                        echo "<label for='banned' class='spaceRight lightText' style='margin-right: 20px;'>Banned</label>";
                        if($user['User_Banned'] == 'Y') {
                            echo "<input id='banned' name='banned' type='checkbox' class='form-check-input' value='N' checked />";
                        } else {
                            echo "<input id='banned' name='banned' type='checkbox' class='form-check-input' value='Y' />";
                        }
                    ?>
                </div>

                <?php
                    echo "<input type='hidden' name='id' id='id' value='{$user['User_Id']}'/>";
                ?>

                <div class="row spaceBefore">
                    <?php
                        echo "<input type='submit' value='Update' class='btn btn-primary largeButton center' style='margin-left: auto;'/>";
                        echo "<a class='btn btn-secondary largeButton center' style='margin-right: auto;' href='cancelHandler.php'>Cancel</a>";
                    ?>
                </div>
        </form>
    </div>
</div>