<!--
    Blog Site - Blog Days of Summer
    Version 1.1
    New Blog
    James Suderman
    3/14/2019
-->

<?php
    require 'datasource.php';
    $datasource = new datasource();
    $categories = $datasource->getCategories();
?>

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
            <form id="blogform" method="post" action="saveHandler.php">
                <div class="row spaceAfter" style="width: 290px; margin-left: auto;">
                    <label for="category" class="lightText">Category: </label>
                    <?php
                        if($_GET['mode'] == 'view') {
                            echo "<select id='category' name='category' class='form-inline form-control spaceRight loginFormControl' style='width: 200px; margin-left: auto;' disabled>";
                            echo "<option value='{$_GET['category']}'>{$_GET['category']}</option>";
                            echo "</select>";
                        } else {
                            echo "<select id='category' name='category' class='form-inline form-control spaceRight loginFormControl' style='width: 200px; margin-left: auto;'>";

                            foreach ($categories as $category) {
                                echo "<option value='{$category['Category_Name']}'>{$category['Category_Name']}</option>";
                            }

                            echo "</select>";
                        }
                    ?>
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
                                    echo "<textarea class='form-control loginFormControl' rows='5' cols='250' maxlength='250' id='body' name='body' disabled>{$_GET['body']}</textarea>";
                                } else {
                                    echo "<textarea class='form-control loginFormControl' rows='5' cols='250' maxlength='250' id='body' name='body' disabled></textarea>";
                                }

                                echo "<div class='row spaceBefore spaceAfter center'>";
                                echo "<div class='stars'>";
                                echo "<input type='radio' name='star1' class='star1' id='star1' />";
                                echo "<label class='star1' for='star1'>1</label>";
                                echo "<input type='radio' name='star2' class='star2' id='star2' />";
                                echo "<label class='star2' for='star2'>2</label>";
                                echo "<input type='radio' name='star3' class='star3' id='star3' />";
                                echo "<label class='star3' for='star3'>3</label>";
                                echo "<input type='radio' name='star4' class='star4' id='star4' />";
                                echo "<label class='star4' for='star4'>4</label>";
                                echo "<input type='radio' name='star5' class='star5' id='star5' />";
                                echo "<label class='star5' for='star5'>5</label>";
                                echo "<span></span>";
                                echo "</div>";
                                echo "</div>";

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
                                echo "<input type='hidden' name='mode' id='mode' value='{$_GET['mode']}'/>";
                            }

                            if($_GET['mode'] != 'view') {
                                echo "<input type='submit' value='Post' class='btn btn-primary largeButton center' style='margin-left: auto;'/>";
                                echo "<a class='btn btn-secondary largeButton center' style='margin-right: auto;' href='cancelHandler.php'>Cancel</a>";
                            } else {
                                echo "<div class='row spaceAfter center'>";
                                echo "<label class='lightText' for='comment'>Comment: </label>";
                                echo "<textarea class='form-control loginFormControl' rows='3' cols='250' maxlength='120' id='comment' name='comment'></textarea>";
                                echo "</div>";

                                echo "<input type='submit' value='Save' class='btn btn-primary largeButton center' style='margin-left: auto;'/>";
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