<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../../App/Views/user_login.php");
    exit();
}
?>

<?php 
// Include the required controller
require_once '../../../App/Controllers/UserController.php';
// Create an instance of the controller
$controller = new UserController();
// Fetch all users
$users = $controller->index(); // Returns data from the User model
?>
<?php include '../Layout/Header.php'; ?>

<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">User List</h1>
    
    <table class="table-auto w-full border-collapse border border-gray-400">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-400 px-4 py-2">ID</th>
                <th class="border border-gray-400 px-4 py-2">Name</th>
                <th class="border border-gray-400 px-4 py-2">Email</th>
                <th class="border border-gray-400 px-4 py-2">Position</th>
                <th class="border border-gray-400 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="border border-gray-400 px-4 py-2"><?php echo $user['id']; ?></td>
                        <td class="border border-gray-400 px-4 py-2"><?php echo $user['name']; ?></td>
                        <td class="border border-gray-400 px-4 py-2"><?php echo $user['email']; ?></td>
                        <td class="border border-gray-400 px-4 py-2"><?php echo $user['position']; ?></td>
                        <td class="border border-gray-400 px-4 py-2 text-center">
    <!-- Container for buttons -->
                            <div class="space-x-4">
                                <!-- Edit Button -->
                                <a href="edit.php?id=<?php echo $user['id']; ?>" 
                                class="inline-block text-white bg-blue-500 hover:bg-blue-700 rounded px-4 py-2"
                                style="display: inline-block; color: white; background-color: blue;" >
                                    Edit
                                </a>

                                <!-- View Button -->
                                <a href="view.php?id=<?php echo $user['id']; ?>" 
                                class="inline-block text-white bg-green-500 hover:bg-green-700 rounded px-4 py-2"
                                style="display: inline-block; color: white; background-color: green;" >
                                    View
                                </a>

                                <!-- Delete Button -->
                                <a href="delete.php?id=<?php echo $user['id']; ?>" 
                                class="inline-block text-white bg-red-500 hover:bg-red-700 rounded px-4 py-2 "
                                style="display: inline-block; color: white; background-color: red;" 
                                onclick="return confirm('Are you sure you want to delete this user?');">
                                    Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center border border-gray-400 px-4 py-2">No users found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include '../Layout/Footer.php'; ?>
