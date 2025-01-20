<?php
require_once '../../../App/Controllers/ProductsController.php';

$controller = new ProductsController();

// Handle product update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure the product ID is passed correctly
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        $controller->update($product_id); // Pass the product ID to update the correct product
        header("Location: ../ProductsDashboard.php");
        exit();
    }
}

// Fetch product details for editing
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $product = $controller->show($product_id);

    if (!$product) {
        die('Product not found.');
    }
} else {
    die('Invalid product ID.');
}
?>

<?php include '../Layout/Header.php'; ?>

<div class="container mx-auto p-4">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Edit Product</h2>

        <form action="Productsedit.php?product_id=<?php echo $product['product_id']; ?>" method="POST" class="space-y-6">

            <div>
                <label for="product_name" class="block text-sm font-medium text-gray-700 mb-2">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="w-full border border-gray-200 rounded-lg p-3" value="<?php echo $product['product_name']; ?>" required>
            </div>

            <div>
                <label for="product_number" class="block text-sm font-medium text-gray-700 mb-2">Product Number</label>
                <input type="text" name="product_number" id="product_number" class="w-full border border-gray-200 rounded-lg p-3" value="<?php echo $product['product_number']; ?>" required>
            </div>

            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="w-full border border-gray-200 rounded-lg p-3" value="<?php echo $product['quantity']; ?>" required>
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                <input type="number" name="price" id="price" step="0.01" class="w-full border border-gray-200 rounded-lg p-3" value="<?php echo $product['price']; ?>" required>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg">Update Product</button>
        </form>
    </div>
</div>

<?php include '../Layout/Footer.php'; ?>
