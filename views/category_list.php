<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopUp Store - Categories</title>
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
    <?php include 'components/navbar-admin.php'; ?>

    <div class="flex">
        <!-- Sidebar -->
        <?php include 'components/sidebar-admin.php'; ?>
        <!-- Main Content -->
        <div class="flex-1 ml-72 mt-20 p-8">
            <h1 class="text-3xl font-bold mb-5">Categories</h1>
            <button type="button" class="px-3 py-2 text-sm mb-5 font-medium text-center inline-flex items-center text-white bg-[#1D1242] rounded-lg hover:bg-[#1D1242] focus:ring-4 focus:outline-none focus:ring-blue-300">
                <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
                </svg>
                <a href="index.php?modul=category&fitur=insert">New Category</a>
                
            </button>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                    <thead class="text-xs text-white uppercase bg-[#1D1242]">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Deskripsi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Slug
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($categories as $category): ?>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <?php echo $category['id']; ?>
                            </th>
                            <td class="px-6 py-4">
                                <?php echo $category['name']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $category['description']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $category['slug']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <img src="<?= $category['image'] ?>" alt="<?= $category['name'] ?>" style="max-width: 100px;">
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="../index.php?modul=category&fitur=edit&id=<?php echo htmlspecialchars($category['id']); ?>" class="text-gray-400 hover:text-gray-100 mx-2">
                                    <i class="material-icons-outlined text-blue-600">edit</i>
                                </a>
                                
                                <a href="../index.php?modul=category&fitur=delete&rid=<?php echo htmlspecialchars($category['id']); ?>" class="text-gray-400 hover:text-gray-100 ml-2">
                                    <i class="material-icons-round text-red-600">delete_outline</i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                <nav>
                    <ul class="inline-flex items-center">
                        <?php if ($page > 1): ?>
                            <li>
                                <a href="?modul=category&fitur=list&page=<?php echo $page - 1; ?>&search=<?php echo htmlspecialchars($search ?? ''); ?>" 
                                class="px-3 py-2 bg-gray-200 hover:bg-gray-300 rounded-l">Previous</a>
                            </li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li>
                                <a href="?modul=category&fitur=list&page=<?php echo $i; ?>&search=<?php echo htmlspecialchars($search ?? ''); ?>" 
                                class="px-3 py-2 <?php echo ($i == $page) ? 'bg-blue-500 text-white' : 'bg-gray-200 hover:bg-gray-300'; ?> rounded"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($page < $totalPages): ?>
                            <li>
                                <a href="?modul=category&fitur=list&page=<?php echo $page + 1; ?>&search=<?php echo htmlspecialchars($search ?? ''); ?>" 
                                class="px-3 py-2 bg-gray-200 hover:bg-gray-300 rounded-r">Next</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</body>
</html>
