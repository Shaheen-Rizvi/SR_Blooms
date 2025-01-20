<?php
require_once __DIR__ . '/../../Config/Database.php';  
require_once __DIR__ . '/../Models/User.php';         

class UserController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        $this->user = new User($this->db);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->user->name = $_POST['name'];
            $this->user->email = $_POST['email'];
            $this->user->username = $_POST['username'];
            $this->user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            if ($this->user->create()) {
                header('Location: ../Views/dashboard.php?success=User created successfully');
                exit;
            } else {
                echo "Failed to create user. Please try again.";
            }
        }
    }

    public function index() {
        return $this->user->getAll();
    }

    public function show($id) {
        $this->user->id = $id;
        return $this->user->getById();
    }

    public function delete($id) {
        $this->user->id = $id; 
        if ($this->user->delete()) {
            header('Location: ../Views/dashboard.php?success=User deleted successfully');
            exit;
        } else {
            echo "Failed to delete the user. Please try again.";
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->user->id = $_POST['id'];
            $this->user->name = $_POST['name'];
            $this->user->email = $_POST['email'];
            $this->user->username = $_POST['username'];

            if (!empty($_POST['password'])) {
                $this->user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            }

            if ($this->user->update()) {
                header('Location: ../Views/dashoard.php?success=User updated successfully');
                exit;
            } else {
                echo "Failed to update user. Please try again.";
            }
        }
    }
}
