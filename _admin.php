<div class="container">
    <div class="row">
        <h1>Admin</h1>
    </div>

    <hr/>

    <div class="row spaceAfter">
        <a class="btn btn-primary largeButton" href="blog.php">New</a>
    </div>

    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">User Name</th>
            <th scope='col'>Password</th>
            <th scope='col'>Admin</th>
            <th scope='col'></th>
            <th scope='col'></th>
        </tr>
        </thead>
        <tbody>
        <?php
            session_start();
            $_SESSION['task'] = "blogs";
            foreach($users as $user) {
                echo "<tr>";

                echo "<td>{$user['First_Name']}</td>";
                echo "<td>{$user['Last_Name']}</td>";
                echo "<td>{$user['Email']}</td>";
                echo "<td>{$user['User_Name']}</td>";
                echo "<td>{$user['Password']}</td>";

                if($user['User_Role'] == "Admin") {
                    echo "<td>";
                    echo "<input type='checkbox' class='form-check-input' value='' disabled checked>";
                    echo "</td>";
                } else {
                    echo "<td>";
                    echo "<input type='checkbox' class='form-check-input' value='' disabled >";
                    echo "</td>";
                }

                echo "<td><a class='btn btn-secondary largeButton' href='user.php?id={$user['User_Id']}'>EDIT</a></td>";
                echo "<td><a class='btn btn-danger largeButton' href='deleteUserHandler.php?id={$user['User_Id']}'>DELETE</a></td>";

                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
    <div class="row spaceAfter">
        <a class="btn btn-dark largeButton" href="cancelHandler.php">Back</a>
    </div>
</div>
