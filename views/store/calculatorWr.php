<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kalkulator Winrate - Mas Rusdi Store</title>
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
        Kalkulator Winrate
        </p>
        <p class="text-secondary font-medium mx-auto mt-6 max-w-3xl text-center text-lg leading-8">
        Digunakan untuk menghitung total jumlah pertandingan yang harus diambil untuk mencapai target tingkat kemenangan yang diinginkan.
Total Pertandingan Kamu Saat Ini.

        </p>
    </div>

    <form class ="flex flex-col items-center" method="POST">

        <div class="mb-6 w-[50%]">
            <label for="email" class="block mb-2 text-sm font-medium text-secondary dark:text-white">Total Pertandingan Kamu Saat Ini</label>
            <input type="number" id="currentMatch" class="bg-[#111827] border border-secondary text-secondary text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="contoh:145" required />
        </div> 
        <div class="mb-6 w-[50%]">
            <label for="password" class="block mb-2 text-sm font-medium text-secondary dark:text-white">Total Win Rate Kamu Saat Ini</label>
            <input type="number" id="currentWR" class="bg-[#111827] border border-secondary text-secondary text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="contoh: 44.58" required />
        </div> 
        <div class="mb-6 w-[50%]">
            <label for="desiredWinrate" class="block mb-2 text-sm font-medium text-secondary dark:text-white">Win Rate Total yang Kamu Inginkan</label>
            <input type="number" id="desiredWinrate" class="bg-[#111827] border border-secondary text-secondary text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="70" required />
        </div>
        <button type="submit" class="text-white bg-secondary hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm md:w-[50%] sm:w-auto px-5 py-2.5 text-center ">Hitung</button>
        <div class="result">
            <p class="wr"></p>
        </div>
    </form>

    <?php include './views/components/footer.php'; ?>
</body>
<script>
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e){
        e.preventDefault();
        calculateWinrate();
    });
   function calculateWinrate(){
    let currentMatch = document.getElementById('currentMatch').value;
    let currentWR = document.getElementById('currentWR').value;
    let desiredWinrate = document.getElementById('desiredWinrate').value;

    let totalMatch = (desiredWinrate * currentMatch) / currentWR;
    document.querySelector('.wr').textContent = `Total Pertandingan yang Harus Kamu Ambil Untuk Mencapai Target Winrate Adalah ${totalMatch}`;
    // alert(`Total pertandingan yang harus diambil untuk mencapai target winrate adalah ${totalMatch}`);
   }



</script>
</html>