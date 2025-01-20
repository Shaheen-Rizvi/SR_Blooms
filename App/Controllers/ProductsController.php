<?php
require_once __DIR__ . '/../../Config/Database.php';
require_once __DIR__ . '/../Models/Products.php';

class ProductsController {
    private $db;
    private $product;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        $this->product = new Product($this->db);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Use the correct keys from the form
            $this->product->name = $_POST['product_name'];
            $this->product->number = $_POST['product_number'];
            $this->product->quantity = $_POST['quantity'];
            $this->product->price = $_POST['price'];
    
            if ($this->product->create()) {
                header('Location: ../Views/Products/Productslist.php?success=Product created successfully');
                exit;
            } else {
                echo "Failed to create product. Please try again.";
            }
        }
    }

    // New method to get all products
    public function getProducts() {
        return $this->product->getAll();
    }


    public function show($id) {
        $this->product->id = $id;
        return $this->product->getById();
    }

    public function delete($id) {
        $this->product->id = $id;
        if ($this->product->delete()) {
            header('Location: ../Views/Products/list.php?success=Product deleted successfully');
            exit;
        } else {
            echo "Failed to delete product. Please try again.";
        }
    }

    public function update($product_id) {
        if (isset($_POST['product_name'], $_POST['product_number'], $_POST['quantity'], $_POST['price'])) {
            $product_name = $_POST['product_name'];
            $product_number = $_POST['product_number'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
    
            // Assuming $this->product is the model instance
            $product = $this->product;
            $product->id = $product_id; // Use the passed product ID for updating the correct product
            $product->name = $product_name;
            $product->number = $product_number;
            $product->quantity = $quantity;
            $product->price = $price;
    
            // Update the product in the database
            if ($product->update()) {
                // Redirect or notify success
                header('Location: ../ProductsDashboard.php');
                exit();
            } else {
                // Handle error
                echo 'Error updating product';
            }
        }
    }
    
    
}
?>
