<?php
class AdminModel {
    private $db;

    public function __construct() {
        $this->db = new mysqli("localhost", "root",  "", "v_database");
    }

    public function getAdminByUsernameAndPassword($username, $password) {
        $query = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
        $result = $this->db->query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}
?>