<?php
session_start();

if (!isset($_SESSION['admin_id']) || $_SESSION['is_admin'] !== true) {
    header("Location: login.php");
    exit();
}

require_once '../../../App/Controllers/ProductsController.php';

$controller = new ProductsController();
$products = $controller->index();
?>

<?php include '../Layout/Header.php'; ?>

<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Products List</h1>
    
    <table class="w-full border-collapse border border-gray-400">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-400 px-4 py-2">ID</th>
                <th class="border border-gray-400 px-4 py-2">Name</th>
                <th class="border border-gray-400 px-4 py-2">Number</th>
                <th class="border border-gray-400 px-4 py-2">Quantity</th>
                <th class="border border-gray-400 px-4 py-2">Price</th>
                <th class="border border-gray-400 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td class="border border-gray-400 px-4 py-2"><?php echo $product['product_id']; ?></td>
                    <td class="border border-gray-400 px-4 py-2"><?php echo $product['product_name']; ?></td>
                    <td class="border border-gray-400 px-4 py-2"><?php echo $product['product_number']; ?></td>
                    <td class="border border-gray-400 px-4 py-2"><?php echo $product['quantity']; ?></td>
                    <td class="border border-gray-400 px-4 py-2">$<?php echo number_format($product['price'], 2); ?></td>
                    <td class="border border-gray-400 px-4 py-2">
                        <a href="Productsedit.php?product_id=<?php echo $product['product_id']; ?>" class="text-blue-500 hover:underline">Edit</a> | 
                        <a href="Productsdelete.php?product_id=<?php echo $product['product_id']; ?>" class="text-red-500 hover:underline" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="Productscreate.php" class="mt-4 inline-block bg-green-500 text-white px-4 py-2 rounded">Add Product</a>
</div>

<?php include '../Layout/Footer.php'; ?>
