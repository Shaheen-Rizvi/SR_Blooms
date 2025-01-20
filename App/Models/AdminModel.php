<?php

class AdminModel
{
    private $db;

    // Constructor to initialize the database connection
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Method to authenticate an admin
    public function authenticate($email, $password)
    {
        $query = "SELECT * FROM admins WHERE email = :email LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);

        try {
            $stmt->execute();
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            // Check if the admin exists and password is correct
            if ($admin && password_verify($password, $admin['password'])) {
                return $admin; // Return admin details on success
            }

            return false; // Invalid credentials
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    // Method to get all admins
    public function getAllAdmins()
    {
        $query = "SELECT id, name, email FROM admins";

        try {
            $stmt = $this->db->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    // Method to create a new admin
    public function createAdmin($name, $email, $password)
    {
        $query = "INSERT INTO admins (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $this->db->prepare($query);

        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        try {
            return $stmt->execute(); // Returns true on success
        } catch (PDOException $e) {
            die("Insert failed: " . $e->getMessage());
        }
    }

    // Method to delete an admin by ID
    public function deleteAdmin($id)
    {
        $query = "DELETE FROM admins WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);

        try {
            return $stmt->execute(); // Returns true on success
        } catch (PDOException $e) {
            die("Delete failed: " . $e->getMessage());
        }
    }

    // Method to find an admin by their email and password (for login)
    public function findAdmin($email, $password)
    {
        $query = "SELECT id, name, email, password FROM admins WHERE email = :email LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);

        try {
            $stmt->execute();
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            // Check if admin exists and the password matches
            if ($admin && password_verify($password, $admin['password'])) {
                return $admin;
            }

            return false; // Invalid credentials
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
}
?>
