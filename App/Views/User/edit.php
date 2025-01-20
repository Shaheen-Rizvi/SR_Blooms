<?php
// Include the required controller
require_once '../../../App/Controllers/UserController.php';

// Create an instance of the UserController
$controller = new UserController();

// Handle form submission for updating a user
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update(); // Update the user in the database
    header("Location: dashboard.php"); // Redirect back to the dashboard
    exit();
}

// Fetch user details for editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the user by ID (assume the `show` method is available in your controller)
    $user = $controller->show($id);

    // If no user is found, show an error message
    if (!$user) {
        die('User not found.');
    }
} else {
    die('Invalid user ID.');
}
?>

<?php include '../layout/header.php'; ?>

<div class="container mx-auto p-6" style="max-width: 600px; background-color: #f8ebe9; border-radius: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
    <h2 class="text-xl font-bold mb-6" style="color: #333; text-align: center;">Edit User</h2>

    <!-- User Edit Form -->
    <form action="" method="POST" class="space-y-6">
        <!-- Hidden field to store the user ID -->
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>" />

        <div>
            <label for="name" class="block text-sm font-medium" style="color: #333;">Name</label>
            <input type="text" name="name" id="name" class="w-full border rounded p-2" 
                   style="border-color: #ddd; border-radius: 10px; padding: 10px; font-size: 1rem;" 
                   value="<?php echo htmlspecialchars($user['name']); ?>" required>
        </div>

        <div>
            <label for="email" class="block text-sm font-medium" style="color: #333;">Email</label>
            <input type="email" name="email" id="email" class="w-full border rounded p-2" 
                   style="border-color: #ddd; border-radius: 10px; padding: 10px; font-size: 1rem;" 
                   value="<?php echo htmlspecialchars($user['email']); ?>" required>
        </div>

        <!-- Submit button to update the user -->
        <button type="submit" 
                class="w-full text-white px-4 py-2 rounded" 
                style="background-color: #a8c3a0; border: none; font-size: 1rem; cursor: pointer; transition: background-color 0.3s;">
            Update User
        </button>
    </form>
</div>

<?php include '../layout/footer.php'; ?>
