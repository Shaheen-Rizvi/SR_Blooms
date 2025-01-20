<?php

class Database {
    // Database credentials
    private $host = 'localhost';
    private $db_name = 'flower_shop';
    private $Username = 'root';
    private $password = '';
    private $conn;

    // Get the database connection
    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->db_name,
                $this->Username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }
}
?>