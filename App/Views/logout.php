<?php
// Include the AuthController to manage the logout logic
require_once '../Controllers/AuthController.php';

// Create an instance of the AuthController
$authController = new AuthController();

// Call the logout method to handle session destruction
$authController->logout();

// Redirect to the login page after logout
header("Location: admin_login.php");
exit();
?>
