<?php
// Display change password form
?>
<form action="change_password.php" method="post">
    <label for="old_password">Old Password:</label>
    <input type="password" id="old_password" name="old_password"><br><br>
    <label for="new_password">New Password:</label>
    <input type="password" id="new_password" name="new_password"><br><br>
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password"><br><br>
    <input type="submit" value="Change Password">
</form>