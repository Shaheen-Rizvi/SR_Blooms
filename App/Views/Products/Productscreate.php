<?php
require_once '../../../App/Controllers/ProductsController.php';

$controller = new ProductsController();
$controller->create();
?>

<?php include '../Layout/Header.php'; ?>

<div class="container mx-auto p-4">
   <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-8">
       <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Add New Product</h2>

       <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
           <div class="bg-[#a8c3a0] bg-opacity-20 text-[#557348] p-4 rounded-lg mb-6">
               Product added successfully!
           </div>
       <?php endif; ?>

       <form action="http://localhost/FlowerShop/App/Views/Products/Productscreate.php" method="POST" class="space-y-6">
           <div>
               <label for="product_name" class="block text-sm font-medium text-gray-700 mb-2">Product Name</label>
               <input 
                   type="text" 
                   name="product_name" 
                   id="product_name" 
                   class="w-full border border-gray-200 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#a8c3a0] transition-colors"
                   required
               >
           </div>

           <div>
               <label for="product_number" class="block text-sm font-medium text-gray-700 mb-2">Product Number</label>
               <input 
                   type="text" 
                   name="product_number" 
                   id="product_number" 
                   class="w-full border border-gray-200 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#a8c3a0] transition-colors"
                   required
               >
           </div>

           <div>
               <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">Quantity</label>
               <input 
                   type="number" 
                   name="quantity" 
                   id="quantity" 
                   class="w-full border border-gray-200 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#a8c3a0] transition-colors"
                   required
               >
           </div>

           <div>
               <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price</label>
               <input 
                   type="number" 
                   name="price" 
                   id="price" 
                   step="0.01" 
                   class="w-full border border-gray-200 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#a8c3a0] transition-colors"
                   required
               >
           </div>

           <div class="pt-4">
               <button 
                   type="submit" 
                   class="w-full bg-[#a8c3a0] hover:bg-[#97b18f] text-white font-medium py-3 px-4 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-[#a8c3a0] focus:ring-offset-2"
               >
                   Add Product
               </button>
           </div>
       </form>
   </div>
</div>

<?php include '../Layout/Footer.php'; ?>
