<?php
// Start session and check if user is logged in as admin
session_start();

if (!isset($_SESSION['admin_id']) || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: login.php");
    exit();
}

// Include the products controller
include '../Controllers/ProductsController.php';

// Initialize the controller
$controller = new ProductsController();

// Fetch all products
$products = $controller->getProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8ebe9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .dashboard-container {
            background-color: #ffffff;
            width: 90%;
            max-width: 800px;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 1rem;
        }
        p {
            color: #666;
            margin-bottom: 2rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1.5rem;
        }
        th, td {
            text-align: center;
            padding: 0.75rem;
            border: 1px solid #e5e5e5;
        }
        th {
            background-color: #f3f3f3;
            color: #666;
        }
        td {
            color: #333;
        }
        a.action-btn {
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            font-size: 0.9rem;
            margin: 0 5px;
        }
        a.edit-btn {
            background-color: #a8c3a0;
            color: #fff;
        }
        a.delete-btn {
            background-color: #d9534f;
            color: #fff;
        }
        a.add-btn {
            display: inline-block;
            background-color: #a8c3a0;
            color: #fff;
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
            margin-bottom: 1rem;
            transition: background-color 0.3s;
        }
        a.add-btn:hover {
            background-color: #88aa88;
        }
        a.logout-btn {
            display: inline-block;
            background-color: #d9534f;
            color: #fff;
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 1rem;
            transition: background-color 0.3s;
        }
        a.logout-btn:hover {
            background-color: #b52b2a;
        }
        .no-users {
            color: #999;
            font-size: 1rem;
            padding: 1rem;
        }
    </style>
<body>
    <div class="dashboard-container">
        <h1>Products Management</h1>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['admin_name']); ?>! Manage your products below:</p>

        <!-- Products Table -->
        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Number</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)) { ?>
                    <?php foreach ($products as $product) { ?>
                        <tr>
                            <td><?php echo $product['product_id']; ?></td>
                            <td><?php echo $product['product_name']; ?></td>
                            <td><?php echo $product['product_number']; ?></td>
                            <td><?php echo $product['quantity']; ?></td>
                            <td>$<?php echo number_format($product['price'], 2); ?></td>
                            <td>
                                <a href="Products/Productsedit.php?product_id=<?php echo $product['product_id']; ?>" class="action-btn edit-btn">Edit</a>
                                <a href="Products/Productsdelete.php?product_id=<?php echo $product['product_id']; ?>" class="action-btn delete-btn">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr><td colspan="6" class="no-records">No products found</td></tr>
                <?php } ?>
            </tbody>
        </table>

        <a href="Products/Productscreate.php" class="add-btn">Add New Product</a>
        <br>
        <a href="../Public/index.html" class="logout-btn">Logout</a>
    </div>
</body>
</html>
