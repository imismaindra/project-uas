<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopUp Store - Roles</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
</head>
<body class="bg-[#B5C2CA] font-poppins">
    <!-- Navbar -->
    <?php include 'components/navbar-admin.php'; ?>

    <div class="flex">
        <!-- Sidebar -->
        <?php include 'components/sidebar-admin.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 ml-72 mt-20 p-8">
            <h1 class="text-2xl font-bold mb-8">Edit Category</h1>
            <form method="post" action="../index.php?modul=category&fitur=update" enctype="multipart/form-data" class="bg-white px-6 py-8 rounded-lg shadow-lg">
                <div class="grid gap-6 mb-6">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($category['id']); ?>">
                    <!-- Input for Category Name -->
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Category Name</label>
                        <input type="text"  id="name"  name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                            value="<?php echo $category['name']; ?>" required 
                        />
                    </div>

                    <!-- Input for Description -->
                    <div>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                        <input 
                            id="description"  name="description"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter category description" required value=" <?php echo htmlspecialchars($category['description']); ?>"/>
                    </div>
                    <div>
                        <label for="slug" class="block mb-2 text-sm font-medium text-gray-900">Category slug</label>
                        <input type="text"  id="slug"  name="slug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                            value="<?php echo $category['slug']; ?>" required 
                        />
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Current Image</label>
                        <img src="<?php echo htmlspecialchars($category['image']); ?>" alt="Current Image" class="mb-4 w-32 h-32 object-cover">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload file</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" aria-describedby="file_input_help" id="image" name="image" type="file">
                        <p class="mt-1 text-sm text-gray-500" id="file_input_help">
                            Upload a new file to replace the current image.
                        </p>
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
