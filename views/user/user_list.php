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
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
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
            <h1 class="text-3xl font-bold mb-5">Users</h1>
            <button type="button" class="px-3 py-2 text-sm mb-5 font-medium text-center inline-flex items-center text-white bg-[#1D1242] rounded-lg hover:bg-[#1D1242] focus:ring-4 focus:outline-none focus:ring-blue-300">
                <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
                </svg>
                <a href="/user/add">New User</a>
                
            </button>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                    <thead class="text-xs text-white uppercase bg-[#1D1242]">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Username
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Password
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Role
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
        
                    <?php foreach ($users as $user): ?>
                        <?php if($user['role_id'] == 1 || $user['role_id'] == 2):?>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <?php echo $user['id']; ?>
                            </th>
                            <td class="px-6 py-4">
                                <?php echo $user['username']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $user['password']; ?>
                            </td>
                            <td class="px-6 py-4">
                               <?php echo $user['role_name']?>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="/user/edit/<?php echo htmlspecialchars($user['id']); ?>" class="text-gray-400 hover:text-gray-100 mx-2">
                                    <i class="material-icons-outlined text-blue-600">edit</i>
                                </a>
                                
                                <a href="/user/delete/<?php echo htmlspecialchars($user['id']); ?>" class="text-gray-400 hover:text-gray-100 ml-2">
                                    <i class="material-icons-round text-red-600">delete_outline</i>
                                </a>
                            </td>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
