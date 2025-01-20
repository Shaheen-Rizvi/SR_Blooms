<?php
require_once '../Controllers/AuthController.php';

// Handle login form submission
$loginMessage = ""; // To store feedback for the login result
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authController = new AuthController();
    ob_start(); // Start output buffering
    $authController->login($_POST['username'], $_POST['password']);
    $loginMessage = ob_get_clean(); // Capture output
}
?>

<?php include 'Layout/Header.php'; ?>

<div class="page-wrapper" style="display: flex; align-items: center; justify-content: center; min-height: 100vh; background-color: #f8ebe9;">
    <div class="login-container" style="width: 100%; max-width: 400px; background-color: #ffffff; padding: 2rem; border-radius: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); margin: 20px;">
        <div style="text-align: center; margin-bottom: 2rem;">
            <img src="../../1.png" alt="SR BLOOMS" style="max-width: 120px; margin: 0 auto;">
        </div>
        
        <form method="POST" action="">
            <div style="margin-bottom: 1.5rem;">
                <input type="text" id="username" name="username" placeholder="Admin ID" required 
                    style="width: 100%; padding: 0.75rem; border: 1px solid #e5e5e5; border-radius: 5px; outline: none; font-size: 1rem;">
            </div>
            
            <div style="margin-bottom: 1rem; position: relative;">
                <input type="password" id="password" name="password" placeholder="Admin Password" required 
                    style="width: 100%; padding: 0.75rem; border: 1px solid #e5e5e5; border-radius: 5px; outline: none; font-size: 1rem;">
                <span style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                   👁️
                </span>
            </div>
            
            <div style="text-align: right; margin-bottom: 1.5rem;">
                <a href="#" style="color: #666; text-decoration: none; font-size: 0.9rem;">Forgot Password?</a>
            </div>
            
            <button type="submit" 
                style="width: 100%; background-color: #a8c3a0; color: white; padding: 0.75rem; border: none; border-radius: 5px; font-size: 1rem; cursor: pointer; transition: background-color 0.3s;">
                LOG IN
            </button>
        </form>
        
        <!-- Close button -->
        <div style="position: absolute; top: 10px; right: 10px; cursor: pointer;">
            <a href="index.php" style="color: #333; text-decoration: none; font-size: 1.2rem;">✕</a>
        </div>
    </div>
</div>

<script>
// Add password visibility toggle functionality
document.querySelector('span').onclick = function() {
    const passwordInput = document.getElementById('password');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
    }
};

// Handle login feedback
const loginMessage = "<?php echo isset($_GET['error']) && $_GET['error'] === '1' ? 'error' : ''; ?>";
if (loginMessage === "error") {
    alert("Incorrect credentials. Redirecting to homepage...");
    setTimeout(() => {
        window.location.href = "index.php"; // Redirect to homepage
    }, 1000); // Delay for 1 second before redirect
}
</script>

<?php include 'Layout/Footer.php'; ?>
