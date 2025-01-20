<?php
require_once '../../../App/Controllers/UserController.php';

if (isset($_GET['id'])) {
    $controller = new UserController();
    $controller->delete($_GET['id']);
} else {
    echo "No user ID provided.";
}
?>
