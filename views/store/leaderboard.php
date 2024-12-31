<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(!empty($transaksibyInvoices[0]['invoices'])): ?>
        <title>Invoice <?php echo $transaksibyInvoices[0]['invoices'] ?></title>
    <?php else:?>
        <title>Leaderboard - Mas Rusdi Store</title>
    <?php endif;?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.3/dist/cdn.min.js"></script>
    <style>
        footer {
        position: relative;
        z-index: 10; /* Pastikan footer tetap di atas elemen lainnya */
        }
        /* waves */
        .ocean {
        height: 80px; /* change the height of the waves here */
        width: 100%;
        position: relative;
        bottom: 80px;
        left: 0;
        right: 0;
        overflow-x: hidden;
        z-index:30;
        }

        .wave {
        background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 800 88.7'%3E%3Cpath d='M800 56.9c-155.5 0-204.9-50-405.5-49.9-200 0-250 49.9-394.5 49.9v31.8h800v-.2-31.6z' fill='%23111827'/%3E%3C/svg%3E");
        position: absolute;
        width: 200%;
        height: 100%;
        animation: wave 10s -3s linear infinite;
        transform: translate3d(0, 0, 0);
        opacity: 1;
        }

        .wave:nth-of-type(2) {
        bottom: 0;
        animation: wave 18s linear reverse infinite;
        opacity: 0.5;
        }

        .wave:nth-of-type(3) {
        bottom: 0;
        animation: wave 20s -1s linear infinite;
        opacity: 0.5;
        }

        @keyframes wave {
            0% {transform: translateX(0);}
            50% {transform: translateX(-25%);}
            100% {transform: translateX(-50%);}
        }

    </style>
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
              thrid:'#14182E',
            },
            screens: {
              'hp': '465px',
          },
            
          }
        }
      }
    </script>
</head>
<body class="bg-[#1A1B41] font-poppins">
    <!-- navbar -->
    <?php include './views/components/navbar.php'; ?>
    <div class="my-5">
        <p class="text-white font-bold text-3xl text-center mb-4">
        Top 5 Pembelian Terbanyak di MAS RUSDI STORE
        </p>
        <p class="text-secondary font-medium mx-auto mt-6 max-w-3xl text-center text-lg leading-8">
        Berikut ini adalah daftar 5 pembelian terbanyak yang dilakukan oleh pelanggan kami. Data ini diambil dari sistem kami dan selalu diperbaharui.

        </p>
    </div>
    <div class="bg-white shadow-md rounded-md overflow-hidden max-w-lg mx-auto mt-16">
        <div class="bg-secondary py-2 px-4">
            <h2 class="text-xl font-semibold text-black">Top Pembelian 🤩</h2>
        </div>
        <ul class="bg-thrid divide-y divide-gray-200">
            <?php foreach ($top5order as $top5):?>
            <li class="flex items-center py-4 px-6">
                <span class="text-white text-lg font-medium mr-4">1.</span>
                <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full mx-3">
                    <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-medium text-white">
                        <?php echo isset($top5['user_id']) ? $userModel->getUserById($top5['user_id']) : 'Guest'; ?>
                    </h3>
                    <p class="text-white text-base">Rp. <?php echo $top5['total_price'] ?></p>
                </div>
            </li>
            <?php endforeach;?>
        </ul>
    </div>
    <?php include './views/components/footer.php'; ?>
</body>
</html>