<?php
class AdminController {
    private $adminModel;

    public function __construct() {
        $this->adminModel = new AdminModel();
    }

    public function login() {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $admin = $this->adminModel->getAdminByUsernameAndPassword($username, $password);

            if ($admin) {
                // Login successful, redirect to dashboard
                header('Location: dashboard.php');
                exit;
            } else {
                // Login failed, display error message
                $error = 'Invalid username or password';
                include 'views/login.php';
            }
        } else {
            // Display login form
            include 'views/login.php';
        }
    }

    public function dashboard() {
        // Display dashboard
        include 'views/dashboard.php';
    }
}
?>