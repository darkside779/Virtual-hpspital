<?php
// Display profile edit form
?>
<form action="edit_profile.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $_SESSION['name']; ?>"><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $_SESSION['email']; ?>"><br><br>
    <input type="submit" value="Update Profile">
</form>