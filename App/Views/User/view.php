<?php
// Include the required controller
require_once '../../../App/Controllers/UserController.php';

// Create an instance of the UserController
$controller = new UserController();

// Fetch user details
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch all users (optimize by creating a method to fetch a single user)
    $users = $controller->index();
    $user = array_filter($users, fn($u) => $u['id'] == $id)[0]; // Find the user by ID
} else {
    die('Invalid user ID.');
}
?>

<?php include '../Layout/Header.php'; ?>

<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">User Details</h1>
    
    <!-- Display user details -->
    <div class="bg-[#E0F2F1] p-4 rounded shadow-md">
        <p><strong>ID:</strong> <?php echo $user['id']; ?></p>
        <p><strong>Name:</strong> <?php echo $user['name']; ?></p>
        <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
        <p><strong>Position:</strong> <?php echo $user['position']; ?></p>
    </div>

    <!-- Back Button -->
    <div class="mt-4">
        <a href="list.php" class="bg-[#4CAF50] text-white px-4 py-2 rounded hover:bg-green-700">
            Back to User List
        </a>
    </div>
</div>

<?php include '../Layout/Footer.php'; ?>
