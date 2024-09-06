<?php
class UserModel {
    private $db;

    public function __construct() {
        $this->db = new mysqli("localhost", "root",  "", "v_database");
    }

    public function getUserByEmail($email) {
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = $this->db->query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function getUserByEmailAndPassword($email, $password) {
        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = $this->db->query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function updateUserProfile($name, $email) {
        $query = "UPDATE users SET name = '$name', email = '$email' WHERE email = '$email'";
        $this->db->query($query);
    }
    
    public function updateUserPassword($password) {
        $query = "UPDATE users SET password = '$password' WHERE email = '".$_SESSION['email']."'";
        $this->db->query($query);
    }

    public function registerUser($name, $email, $password) {
        $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        $this->db->query($query);
    }
}

?>