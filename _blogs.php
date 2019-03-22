<div class="container">
    <div class="row">
        <h1>Blogs</h1>

        <form id="searchForm" class="form-inline" style="margin-left: auto;">
            <input type="text" id="search" name="search" class="form-control spaceRight loginFormControl"/>
            <a class="btn btn-dark largeButton" href="#" style="margin: 10px;">Search</a>
            <select id="category" name="category" class="form-inline form-control spaceRight loginFormControl" style="width: 100px;">
                <option value="volvo">Author</option>
                <option value="saab">Category</option>
                <option value="mercedes">Title</option>
            </select>
        </form>
    </div>

    <hr/>

    <div class="spaceAfter">
        <a class="btn btn-primary largeButton" href="blog.php">New</a>
    </div>

    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
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

                $viewQuery = http_build_query(array('id' => $post['Post_Id'], 'title' => $post['Post_Title'], 'body' => $post['Post_Body'], 'mode' => 'view'));

                echo "<td><a href='blog.php?$viewQuery'>{$post['Post_Title']}</a></td>";
                echo "<td>Category</td>";
                echo "<td>{$post['Author']}</td>";
                echo "<td>{$post['Post_Date']}</td>";

                if($post['Author'] == $_SESSION['username']) {
                    $editQuery = http_build_query(array('id' => $post['Post_Id'], 'title' => $post['Post_Title'], 'body' => $post['Post_Body']));
                    echo "<td><a class='btn btn-secondary largeButton' href='blog.php?$editQuery'>EDIT</a></td>";
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