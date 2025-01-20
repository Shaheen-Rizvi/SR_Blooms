<?php
require_once '../Controllers/AuthController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authController = new AuthController();
    $authController->login($_POST['email'], $_POST['password']);
}
?>

<?php include 'Layout/Header.php'; ?>

<div class="min-h-screen flex items-center justify-center bg-[#f8ebe9]">
    <div class="relative bg-white p-8 rounded-lg shadow-md w-96 mx-4">

        <a href="index.php" class="absolute top-4 right-4 text-gray-600 hover:text-gray-800">
            <span class="text-xl">×</span>
        </a>

        <div class="text-center mb-8">
            <img src="../../1.png" alt="SR BLOOMS" class="max-w-[120px] mx-auto">
        </div>

        <form method="POST" action="" class="space-y-6">
  
            <div>
                <input 
                    type="text" 
                    name="email" 
                    required 
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#a8c3a0] transition-colors"
                    placeholder="Email"
                >
            </div>

            <!-- Password Field -->
            <div class="relative">
                <input 
                    type="password" 
                    name="password" 
                    id="password"
                    required 
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#a8c3a0] transition-colors"
                    placeholder="Password"
                >
                <button 
                    type="button"
                    onclick="togglePassword()"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>

            <!-- Forgot Password Link -->
            <div class="text-right">
                <a href="forgot_password.php" class="text-sm text-gray-600 hover:text-gray-800 hover:underline">
                    Forgot Password?
                </a>
            </div>

            <!-- Login Button -->
            <button 
                type="submit" 
                class="w-full bg-[#a8c3a0] hover:bg-[#97b18f] text-white font-medium py-3 px-4 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-[#a8c3a0] focus:ring-offset-2"
            >
                LOG IN
            </button>
        </form>

        <?php if (isset($_GET['error'])): ?>
        <div class="mt-4 text-center text-red-600 text-sm">
            Invalid credentials. Please try again.
        </div>
        <?php endif; ?>
    </div>
</div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
}
</script>

<?php include 'Layout/Footer.php'; ?>
