<?php
require_once '../../../App/Controllers/UserController.php';

$controller = new UserController();
$controller->create();
?>

<?php include '../Layout/Header.php'; ?>

<div class="container mx-auto p-4">
   <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-8">
       <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Add New User</h2>

       <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
           <div class="bg-[#a8c3a0] bg-opacity-20 text-[#557348] p-4 rounded-lg mb-6">
               User added successfully!
           </div>
       <?php endif; ?>

       <form action="http://localhost/FlowerShop/App/Views/User/create.php" method="POST" class="space-y-6">
           <div>
               <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
               <input 
                   type="text" 
                   name="name" 
                   id="name" 
                   class="w-full border border-gray-200 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#a8c3a0] transition-colors"
                   required
               >
           </div>

           <div>
               <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
               <input 
                   type="email" 
                   name="email" 
                   id="email" 
                   class="w-full border border-gray-200 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#a8c3a0] transition-colors"
                   required
               >
           </div>

           <div>
               <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
               <input 
                   type="text" 
                   name="username" 
                   id="username" 
                   class="w-full border border-gray-200 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#a8c3a0] transition-colors"
                   required
               >
           </div>

           <div>
               <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
               <input 
                   type="password" 
                   name="password" 
                   id="password" 
                   class="w-full border border-gray-200 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#a8c3a0] transition-colors"
                   required
               >
           </div>

           <div class="pt-4">
               <button 
                   type="submit" 
                   class="w-full bg-[#a8c3a0] hover:bg-[#97b18f] text-white font-medium py-3 px-4 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-[#a8c3a0] focus:ring-offset-2"
               >
                   Create User
               </button>
           </div>
       </form>
   </div>
</div>

<?php include '../Layout/Footer.php'; ?>