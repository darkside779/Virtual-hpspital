<?php
class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function register() {
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userModel->getUserByEmail($email);

            if (!$user) {
                // Register user
                $this->userModel->registerUser($name, $email, $password);
                // Login user
                $this->login($email, $password);
            } else {
                // Display error message
                $error = 'Email already exists';
                include 'views/register.php';
            }
        } else {
            // Display registration form
            include 'views/register.php';
        }
    }

    public function login($email, $password) {
        $user = $this->userModel->getUserByEmailAndPassword($email, $password);

        if ($user) {
            // Login successful, redirect to profile page
            header('Location: profile.php');
            exit;
        } else {
            // Login failed, display error message
            $error = 'Invalid email or password';
            include 'views/login.php';
        }
    }

    public function editProfile() {
        if (isset($_POST['name']) && isset($_POST['email'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
    
            $this->userModel->updateUserProfile($name, $email);
            // Update session variables
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            // Redirect to profile page
            header('Location: profile.php');
            exit;
        } else {
            // Display profile edit form
            include 'views/edit_profile.php';
        }
    }
    
    public function changePassword() {
        if (isset($_POST['old_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
            $old_password = $_POST['old_password'];
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];
    
            $user = $this->userModel->getUserByEmailAndPassword($_SESSION['email'], $old_password);
    
            if ($user) {
                if ($new_password == $confirm_password) {
                    $this->userModel->updateUserPassword($new_password);
                    // Redirect to profile page
                    header('Location: profile.php');
                    exit;
                } else {
                    // Display error message
                    $error = 'New password and confirm password do not match';
                    include 'views/change_password.php';
                }
            } else {
                // Display error message
                $error = 'Invalid old password';
                include 'views/change_password.php';
            }
        } else {
            // Display change password form
            include 'views/change_password.php';
        }
    }
    public function dashboard() {
        // Display dashboard page
        include 'views/dashboard.php';
    }

    public function getUsers() {
        $query = "SELECT * FROM users";
        $result = $this->db->query($query);
        $users = array();
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return $users;
    }
    public function profile() {
        // Display user profile
        include 'views/profile.php';
    }
}

