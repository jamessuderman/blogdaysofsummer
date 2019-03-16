<!--
    Blog Site - Blog Days of Summer
    Version 1.1
    New Blog
    James Suderman
    3/14/2019
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="application.css"/>

    <title>New Blog</title>
</head>
<body>

    <?php include "header.php" ?>

    <div class="container">
        <div class="login center largeMarginTop spaceAfter">
            <form id="blogform" method="post" action="saveBlog.php">
                <div>
                    <div class="row spaceAfter center">
                        <label for="title" class="spaceRight lightText largeButton">Title: </label>
                        <input type="text" id="title" name="title" class="form-control spaceRight loginFormControl"/>
                    </div>
                    <div class="row spaceAfter center">
                        <textarea rows="5" cols="250" maxlength="250" id="body" name="body"></textarea>
                    </div>
                    <div class="row">
                        <input type="submit" value="Post" class="btn btn-primary largeButton center"/>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- This will conditionally show if the page has messages to show -->

    <?php
        if($_GET['message']) {
            echo "<div class='spaceBefore'><div id='bannedMessage' class='spaceAfter center alert alert-danger error-message' style='width: 700px;' role='alert'>";

            if($_GET['message'] == "banned") {
                echo "<p>You have used banned language</p>";
            }

            echo "</div></div>";
        }
    ?>

</body>
</html>