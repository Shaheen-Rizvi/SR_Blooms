<?php
require_once '../../Config/database.php';
require_once '../Models/AdminModel.php';

class AuthController {
    private $adminModel;

    public function __construct() {
        // Initialize database connection
        $database = new Database();
        $db = $database->connect();
        $this->adminModel = new AdminModel($db);
    }

    // Login function
    public function login($email, $password) {
        // Hardcoded credentials for admin
        $adminUsername = 'admin';
        $adminPassword = 'admin123';

        // Check if provided credentials match hardcoded values
        if ($email === $adminUsername && $password === $adminPassword) {
            session_start();
            $_SESSION['admin_id'] = 1; // Admin ID (set to 1 for hardcoded admin)
            $_SESSION['admin_name'] = 'Admin'; // Hardcoded admin name
            $_SESSION['is_admin'] = true; // Indicate that the user is an admin

            // Redirect to dashboard.php after successful login
            header("Location: ../Views/dashboard.php"); // Adjust the relative path as needed
            exit();
        } else {
            // Return to login page with error
            header("Location: ../../Public/index.html?error=1");
            exit();
        }
    }

    // Logout function
    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../../Public/index.html");
        exit();
    }
}
?>
