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

    <?php include "_header.php" ?>

    <div class="container">
        <div class="row">
            <h1>Blogs</h1>

            <form id="searchForm" class="form-inline" style="margin-left: auto;">
                <input type="text" id="search" name="search" class="form-control spaceRight loginFormControl"/>
                <a class="btn btn-dark largeButton" href="#">Search</a>
            </form>
        </div>

        <hr/>

        <div class="spaceAfter">
            <a class="btn btn-primary largeButton" href="blog.php">New</a>
        </div>

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Date</th>
                    <th scope='col'></th>
                    <?php
                        if($_SESSION['role'] == "Admin") {
                            echo "<th scope='col'></th>";
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    session_start();
                    foreach($posts as $post) {
                        echo "<tr>";
                        echo "<td>{$post['Post_Id']}</td>";
                        echo "<td>{$post['Post_Title']}</td>";
                        echo "<td>{$post['Author']}</td>";
                        echo "<td>{$post['Post_Date']}</td>";

                        if($post['Author'] == $_SESSION['username']) {
                            $query = http_build_query(array('id' => $post['Post_Id'], 'title' => $post['Post_Title'], 'body' => $post['Post_Body']));
                            echo "<td><a class='btn btn-secondary largeButton' href='blog.php?$query'>EDIT</a></td>";
                        } else {
                            echo"<td></td>";
                        }

                        if($_SESSION['role'] == "Admin") {
                            echo "<td><a class='btn btn-danger largeButton' href='deleteHandler.php?id={$post['Post_Id']}'>DELETE</a></td>";
                        }

                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>