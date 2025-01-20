<?php

class Product {
    private $conn;
    private $table = 'products';

    public $id;
    public $name;
    public $number;
    public $quantity;
    public $price;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create a new product
    public function create() {
        $query = "INSERT INTO " . $this->table . " (product_name, product_number, quantity, price) 
                  VALUES (:name, :number, :quantity, :price)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':number', $this->number);
        $stmt->bindParam(':quantity', $this->quantity);
        $stmt->bindParam(':price', $this->price);

        return $stmt->execute();
    }

    // Get all products
    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Get a product by ID
    public function getById() {
        $query = "SELECT * FROM " . $this->table . " WHERE product_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update a product
    public function update() {
        $query = "UPDATE " . $this->table . "
                  SET product_name = :name, product_number = :number, quantity = :quantity, price = :price
                  WHERE product_id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':number', $this->number);
        $stmt->bindParam(':quantity', $this->quantity);
        $stmt->bindParam(':price', $this->price);

        return $stmt->execute();
    }

    // Delete a product
    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE product_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }
}
?>
