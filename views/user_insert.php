<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopUp Store - Users</title>
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
    <?php include 'components/navbar-admin.php'; ?>

    <div class="flex">
        <!-- Sidebar -->
        <?php include 'components/sidebar-admin.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 flex justify-center ml-72 mt-20 p-8">
            <form method="post" action="../index.php?modul=users&fitur=add" class="bg-white px-6 py-8 rounded-lg shadow-lg w-[45rem]">
                <h1 class="text-xl font-bold mb-8">Insert Users</h1>
                <div class="grid gap-6 mb-6">
                    <!-- Input for Category Name -->
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                        <input 
                            type="text" 
                            id="username" 
                            name="username" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                            placeholder="Enter username" 
                            required 
                        />
                    </div>

                    <!-- Input for Description -->
                    <div>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input 
                            type="text" 
                            id="password" 
                            name="password" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                            placeholder="Enter password" 
                            required 
                        />
                    </div>
                    <div>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                            placeholder="Enter email" 
                            required 
                        />
                    </div>
                    <div>
                        <label for="role_id" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                        <select id="role_id" name="role_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>pilih Roles</option>
                            <?php  foreach ($roles as $role): ?>
                            <option value="<?php echo $role['id']; ?>"><?php echo $role['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
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
