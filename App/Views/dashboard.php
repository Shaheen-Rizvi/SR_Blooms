<?php
// Start session and check if user is logged in as admin
session_start();

// Ensure that the session has the correct admin login status
if (!isset($_SESSION['admin_id']) || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    // Redirect to login page if not logged in as admin
    header("Location: login.php");
    exit();
}

// Database connection (use your actual credentials)
$servername = "localhost";
$Username = "root";
$password = "";
$dbname = "flower_shop";

// Create connection
$conn = new mysqli($servername, $Username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch users from the database
$sql = "SELECT id, Username, email FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css"> 
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
        a.product-btn {
            display: inline-block;
            background-color: #5bc0de;
            color: #fff;
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
            margin-bottom: 1rem;
            transition: background-color 0.3s;
        }
        a.product-btn:hover {
            background-color: #39a8b3;
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
</head>
<body>
    <div class="dashboard-container">
        <h1>Admin Dashboard</h1>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['admin_name']); ?>! Manage your users below:</p>

        <!-- Users Table -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Output each row of users
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['Username'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>
                                <a href='User/edit.php?id=" . $row['id'] . "' class='action-btn edit-btn'>Edit</a>
                                <a href='User/delete.php?id=" . $row['id'] . "' class='action-btn delete-btn'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='no-users'>No users found</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <a href="User/create.php" class="add-btn">Add New User</a>
        <a href="ProductsDashboard.php" class="product-btn">Product Dashboard</a> <!-- Product Dashboard button added here -->
        <br>
        <a href="../../Public/index.html" class="logout-btn">Logout</a>
    </div>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
