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

    <?php include "_header.php" ?>

    <div class="container">
        <div class="login center largeMarginTop spaceAfter">
            <form id="blogform" method="post" action="saveBlog.php">
                <div class="row spaceAfter" style="width: 290px; margin-left: auto;">
                    <label for="category" class="lightText">Category: </label>
                    <select id="category" name="category" class="form-inline form-control spaceRight loginFormControl" style="width: 200px; margin-left: auto;">
                        <option value="volvo">Technology</option>
                        <option value="saab">Entertainment</option>
                        <option value="mercedes">Leisure</option>
                        <option value="audi">Family</option>
                    </select>
                </div>
                <div>
                    <div class="row spaceAfter center">
                        <label for="title" class="spaceRight lightText largeButton">Title: </label>
                        <?php
                            if($_GET['mode'] == 'view') {
                                if($_GET['title']) {
                                    echo "<input type='text' id='title' name='title' class='form-control spaceRight loginFormControl' value='{$_GET['title']}' readonly='readonly'/>";
                                } else {
                                    echo "<input type='text' id='title' name='title' class='form-control spaceRight loginFormControl' readonly='readonly'/>";
                                }
                            } else {
                                if($_GET['title']) {
                                    echo "<input type='text' id='title' name='title' class='form-control spaceRight loginFormControl' value='{$_GET['title']}'/>";
                                } else {
                                    echo "<input type='text' id='title' name='title' class='form-control spaceRight loginFormControl'/>";
                                }
                            }
                        ?>
                    </div>
                    <div class="row spaceAfter center">
                        <?php
                            if($_GET['mode'] == 'view') {
                                if ($_GET['body']) {
                                    echo "<textarea rows='5' cols='250' maxlength='250' id='body' name='body' disabled>{$_GET['body']}</textarea>";
                                } else {
                                    echo "<textarea rows='5' cols='250' maxlength='250' id='body' name='body' disabled></textarea>";
                                }
                            } else {
                                if ($_GET['body']) {
                                    echo "<textarea rows='5' cols='250' maxlength='250' id='body' name='body'>{$_GET['body']}</textarea>";
                                } else {
                                    echo "<textarea rows='5' cols='250' maxlength='250' id='body' name='body'></textarea>";
                                }
                            }
                        ?>
                    </div>
                    <div class="row">
                        <?php
                            if($_GET['id']) {
                                echo "<input type='hidden' name='id' id='id' value='{$_GET['id']}'/>";
                            }

                            if($_GET['mode'] != 'view') {
                                echo "<input type='submit' value='Post' class='btn btn-primary largeButton center' style='margin-left: auto;'/>";
                                echo "<a class='btn btn-secondary largeButton center' style='margin-right: auto;' href='cancelHandler.php'>Cancel</a>";
                            } else {
                                echo "<a class=\"btn btn-secondary largeButton center\" style=\"margin-right: auto;\" href=\"cancelHandler.php\">Back</a>";
                            }
                        ?>
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