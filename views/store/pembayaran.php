<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(!empty($transaksibyVA[0]['invoices'])): ?>
        <title>Invoice <?php echo $transaksibyVA[0]['kodeVA'] ?></title>
    <?php else:?>
        <title>Pembayaran - Mas Rusdi Store</title>
    <?php endif;?>

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
            },
            screens: {
              'hp': '465px',
          },
            
          }
        }
      }
    </script>
</head>
<body class="bg-[#1A1B41]">
    <!-- navbar -->
    <?php include './views/components/navbar.php'; ?>
    <!-- content -->
    <?php if (isset($transaksibyVA) && !empty($transaksibyVA)): ?>
        <section id="main" class="flex flex-col justify-center items-center my-10">
          <p class="text-white font-bold text-3xl text-center mb-4">
              Lakukan Pembayaranmu dengan IndraPay
          </p>
          <p class="text-secondary font-semibold text-xl text-secondary text-center mb-6">
              Masukkan nominal sesuai dengan tagihanmu.
          </p>
          <form method="post" action= "index.php?modul=transaksi&fitur=pembayaran&vacode=" id="pemabayaran" class="w-full max-w-md bg-[#161934] px-5 py-5 rounded rounded-xl">
            <label class = "text-white font-semibold mb-2">Tagihan yang harus dibayar:</label>
          <div class="px-5 py-5 bg-secondary rounded-xl flex flex-col">
            <span class="font-bold text-white text-3xl"> Rp&nbsp;<?php echo $transaksibyVA[0]['total_price']?></span>
          </div>    
          <label for="kodeva" class="block mb-2 text-sm font-medium text-white">Masukkan nominal sesuai tagihan:
              </label>
              <input 
                  id="nominalpembayaran"
                  name="nominalpembayaran"
                  type="number" 
                  class="w-full rounded-lg border border-secondary bg-[#262659] p-3 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-offset-2" 
                  placeholder="Rp xx.xxx" 
              />
              <button class="bg-secondary rounded rounded-lg font-semibold my-5 w-full" type="submit">
                  Lanjutkan
              </button>
          </form>
      </section>
    <?php else: ?>
      <section id="main" class="flex flex-col justify-center items-center my-10">
          <p class="text-white font-bold text-3xl text-center mb-4">
              Lakukan Pembayaranmu dengan IndraPay
          </p>
          <p class="text-secondary font-semibold text-xl text-secondary text-center mb-6">
              Masukkan kode VA yang valid untuk melakukan pembayaran.
          </p>
          <form method="post" action= "index.php?modul=transaksi&fitur=pembayaran&vacode=" id="kodevaForm" class="w-full max-w-md bg-[#161934] px-5 py-5 rounded rounded-xl">
              <label for="kodeva" class="block mb-2 text-sm font-medium text-white">Masukkan kode VA disini
              </label>
              <input 
                  id="kodeva"
                  name="kodeva"
                  type="text" 
                  class="w-full rounded-lg border border-secondary bg-[#262659] p-3 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-offset-2" 
                  placeholder="Masukkan kode VA kamu di sini" 
              />
              <button class="bg-secondary rounded rounded-lg font-semibold my-5 w-full" type="submit">
                  Lanjutkan
              </button>
          </form>
      </section>
    <?php endif; ?>
    <script>
      document.getElementById('kodevaForm').addEventListener('submit', function(event) {
          const kodevaValue = document.getElementById('kodeva').value;

          console.log(kodevaValue);
          if (kodevaValue.trim() !== "") {
              this.action = `index.php?modul=transaksi&fitur=pembayaran&vacode=${encodeURIComponent(kodevaValue)}`;
          } else {
              alert("Nomor Kode VA harus diisi!");
              event.preventDefault();
          }
      });
    </script>
    <?php include './views/components/footer.php'; ?>
</body>
</html>