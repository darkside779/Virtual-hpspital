<?php
// Display dashboard page
include 'header.php';
?>
<h1>Dashboard</h1>
<p>Welcome, <?php echo $_SESSION['name']; ?>!</p>
<h2>Users</h2>
<ul>
    <?php
    $users = $this->userModel->getUsers();
    foreach ($users as $user) {
        echo "<li>$user[name]</li>";
    }
    ?>
</ul>