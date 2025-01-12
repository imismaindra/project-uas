<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update - TopUp Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <script>
      tailwind.config = {
        theme: {
          // screens: {
          // 'tablet': '640px',
          // 'laptop': '1024px',
          
          // 'desktop': '1280px',
          // },
          extend: {
            colors: {
              secondary: '#3FC43B',
            },
            fontFamily: {
                poppins: ['Poppins', 'sans-serif'],
            },
            screens: {
              'hp': '465px',
          },
            
          }
        }
      }
    </script>
</head>
<body class="bg-[#B5C2CA] font-poppins">
    <!-- Navbar -->
    <?php include './views/components/navbar-admin.php'; ?>

    <div class="flex">
        <!-- Sidebar -->
        <?php include './views/components/sidebar-admin.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 ml-72 mt-20 p-8">
            <h1 class="text-2xl font-bold mb-8">Edit Product</h1>
            <form method="post" action="../index.php?modul=product&fitur=update" class="bg-white px-6 py-8 rounded-lg shadow-lg">
                <div class="grid gap-6 mb-6">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">

                    <!-- Input for Product Name -->
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Product Name</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                            placeholder="Enter product name" 
                            value="<?php echo $product['name']?>"
                            required 
                        />
                    </div>
                    <!-- Select for Category -->
                    <div>
                        <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                        <select id="category_id" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option value="" disabled>Pilih Category</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category['id']; ?>" <?php echo $product['id'] == $category['id'] ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($category['name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Input for Stock -->
                    <div>
                        <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">Stock</label>
                        <input 
                            value="<?php echo $product['stock']?>"
                            type="number" 
                            id="stock" 
                            name="stock" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                            placeholder="Enter stock quantity" 
                            required 
                        />
                    </div>

                    <!-- Input for Price -->
                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                        <input 
                        value="<?php echo $product['price']?>"
                            type="number" 
                            id="price" 
                            name="price" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                            placeholder="Enter product price" 
                            required 
                        />
                    </div>

                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button 
                        type="submit" 
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
