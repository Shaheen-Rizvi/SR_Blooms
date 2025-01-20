<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: user_login.php");
    exit();
}
?>

<?php include 'Layout/Header.php'; ?>

<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6">Welcome to the User Management App</h1>
    <p class="mb-4">This is a simple CRUD application where you can manage users. Use the navigation below to access different features.</p>
    
    <div class="space-y-4">
        <!-- View User List Button -->
        <a href="users/list.php" class="block bg-green-500 text-white px-4 py-2 rounded text-center hover:bg-green-700">
            View User List
        </a>
        
        <!-- Add New User Button -->
        <a href="users/create.php" class="block bg-purple-500 text-white px-4 py-2 rounded text-center hover:bg-purple-700">
            Add New User
        </a>
    </div>
</div>

<?php include 'Layout/Footer.php'; ?>
