<?php
require_once '../../../App/Controllers/ProductsController.php';

$controller = new ProductsController();

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

<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Product Details</h1>
    <div class="bg-gray-100 p-4 rounded shadow-md">
        <p><strong>ID:</strong> <?php echo $product['product_id']; ?></p>
        <p><strong>Name:</strong> <?php echo $product['product_name']; ?></p>
        <p><strong>Number:</strong> <?php echo $product['product_number']; ?></p>
        <p><strong>Quantity:</strong> <?php echo $product['quantity']; ?></p>
        <p><strong>Price:</strong> $<?php echo number_format($product['price'], 2); ?></p>
    </div>
    <a href="ProductsDashboard.php" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Back to Products</a>
</div>

<?php include '../Layout/Footer.php'; ?>
