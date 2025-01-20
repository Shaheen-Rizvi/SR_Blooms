<?php

class User {
        private $conn;
        private $table = 'Users';
    
        public $id;
        public $name;
        public $email;
    
    
        public function __construct($db) {
            $this->conn = $db;
        }
    
        public function create() {
            $query = "INSERT INTO " . $this->table . " (name, email) VALUES (:name, :email)";
            $stmt = $this->conn->prepare($query);
    
            // Bind parameters
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':email', $this->email);

    
            if ($stmt->execute()) {
                return true;
            }
            return false;
        }
    
    
    // Fetch all users
    public function getAll() {
        // Corrected to use $this->conn instead of $this->db
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete() {
        // SQL query to delete an User
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        // Prepare the query
        $stmt = $this->conn->prepare($query);
        // Bind the ID parameter to the query
        $stmt->bindParam(':id', $this->id);
        // Execute the query
        if ($stmt->execute()) {
            return true; // Return true if deletion was successful
        }
        // Return false if deletion failed
        return false;
    }

    public function getById() {
        $query = "SELECT * FROM users WHERE id = :id LIMIT 1"; // Query to fetch a single user
        $stmt = $this->conn->prepare($query); // Prepare the statement
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT); // Bind the user ID to the query
        $stmt->execute(); // Execute the query
        return $stmt->fetch(PDO::FETCH_ASSOC); // Return the user data as an associative array
    }
    

    public function update() {
        $query = "UPDATE " . $this->table . " 
                  SET name = :name, email = :email
                  WHERE id = :id";
    
        $stmt = $this->conn->prepare($query);
    
        // Bind parameters
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);

    
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    
}

?>
