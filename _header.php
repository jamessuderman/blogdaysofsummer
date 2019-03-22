<!--
    Blog Site - Blog Days of Summer
    Version 1.1
    Header template for all pages
    James Suderman
    3/15/2019
-->

<?php session_start() ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="application.php">BLOG DAYS OF SUMMER</a>
    <div style="padding-top: 4px; margin-left: auto;">
        <label class="navbar-brand spaceAfter"><?php echo $_SESSION['username'] ?></label>
        <a class="btn btn-light" href="logoutHandler.php">Logout</a>
    </div>
</nav>