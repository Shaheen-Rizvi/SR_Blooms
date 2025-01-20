<?php
require_once '../../../App/Controllers/ProductsController.php';

if (isset($_GET['product_id'])) {
    $controller = new ProductsController();
    $controller->delete($_GET['product_id']);
} else {
    echo "No product ID provided.";
}
?>
