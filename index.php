<!--
    Blog Site - Blog Days of Summer
    Version 1.0
    Login / Registration Module
    James Suderman
    3/3/2019
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="application.css"/>

    <title>Blog Days of Summer</title>
</head>
<body class="container">
    <div class="login center largeMarginTop spaceAfter">

        <div class="row spaceAfter">
            <div class="btn-group center" role="group" aria-label="Login">
                <button id="loginButton" type="button" class="btn btn-primary largeButton" onclick="toggleClass('login')">Login</button>
                <button id="registerButton" type="button" class="btn btn-secondary largeButton" onclick="toggleClass('register')">Register</button>
            </div>
        </div>

        <!-- The following 2 forms are controlled by javascript to show upon toggle button select -->

        <form id="loginForm" method="post" action="login.php">
            <div>
                <div class="row spaceAfter center">
                    <label for="username" class="spaceRight lightText largeButton">Username: </label>
                    <input type="text" id="username" name="username" class="form-control spaceRight loginFormControl"/>
                </div>
                <div class="row spaceAfter center">
                    <label for="password" class="spaceRight lightText largeButton">Password: </label>
                    <input type="password" id="password" name="password" class="form-control spaceRight loginFormControl"/>
                </div>
                <div class="row">
                    <input type="submit" value="Submit" class="btn btn-primary largeButton center"/>
                </div>
            </div>
        </form>

        <form id="registrationForm" method="post" action="register.php">
            <div>
                <div class="row spaceAfter center">
                    <label for="firstName" class="spaceRight lightText largeButton">First Name: </label>
                    <input type="text" id="firstName" name="firstName" class="form-control spaceRight loginFormControl"/>
                </div>
                <div class="row spaceAfter center">
                    <label for="lastName" class="spaceRight lightText largeButton">Last Name: </label>
                    <input type="text" id="lastName" name="lastName" class="form-control spaceRight loginFormControl"/>
                </div>
                <div class="row spaceAfter center">
                    <label for="email" class="spaceRight lightText largeButton">Email: </label>
                    <input type="text" id="email" name="email" class="form-control spaceRight loginFormControl"/>
                </div>
                <div class="row spaceAfter center">
                    <label for="screenName" class="spaceRight lightText largeButton">Username: </label>
                    <input type="text" id="screenName" name="screenName" class="form-control spaceRight loginFormControl"/>
                </div>
                <div class="row spaceAfter center">
                    <label for="pass" class="spaceRight lightText largeButton">Password: </label>
                    <input type="text" id="pass" name="pass" class="form-control spaceRight loginFormControl"/>
                </div>
                <div class="row">
                    <input type="submit" value="Register" class="btn btn-primary largeButton center"/>
                </div>
            </div>
        </form>
    </div>

    <!-- This will conditionally show if the page has messages to show and be red or green dependent on message -->

    <?php
        if($_GET['message']) {
            echo "<div class='spaceBefore'><div id='messages' class='spaceAfter center alert alert-danger error-message' style='width: 700px;' role='alert'>";

                    if($_GET['message'] == "nouser") {
                        echo "<script>document.getElementById('messages').classList.remove('alert-success');</script>";
                        echo "<script>document.getElementById('messages').classList.add('alert-danger');</script>";
                        echo "<p>The user was not found in the database</p>";
                    } else if($_GET['message'] == "nopass") {
                        echo "<script>document.getElementById('messages').classList.remove('alert-success');</script>";
                        echo "<script>document.getElementById('messages').classList.add('alert-danger');</script>";
                        echo "<p>The password for the user is incorrect</p>";
                    } else if($_GET['message'] == "updated") {
                        echo "<script>document.getElementById('messages').classList.remove('alert-danger');</script>";
                        echo "<script>document.getElementById('messages').classList.add('alert-success');</script>";
                        echo "<p>User was registered</p>";
                    }

            echo "</div></div>";
        }
    ?>

    <script src="login.js"></script>

</body>
</html>