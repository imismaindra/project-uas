<?php
  $status = isset($_SESSION['status']) ? $_SESSION['status'] : null;
  $message = isset($_SESSION['message']) ? $_SESSION['message'] : null;
  $redirect = isset($_SESSION['redirect']) ? $_SESSION['redirect'] : null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up - Rusdi Store</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
<body>
<!-- component -->
    <div class="h-screen flex">
    <div class="hidden md:block md:flex w-1/2 bg-gradient-to-tr from-[#1A1B41] to-[#3FC43B] i justify-around items-center">
        <div>
        <h1 class="text-white font-bold text-4xl font-sans">Mas Rusdi Store </h1>
        <p class="text-white mt-1">The most popular Gaming Store at SEA</p>
        <button type="submit" class="block w-28 bg-white text-[#1A1B41] mt-4 py-2 rounded-2xl font-semibold mb-2">Back to Store</button>
        </div>
    </div>
    <div class="flex w-full md:w-1/2 justify-center items-center bg-[#1A1B41]">
        <form class="bg-[#1A1B41]" action="/auth/checkregister" method="post">
          <h1 class="text-white font-bold text-2xl mb-1">Daftar!</h1>
          <p class="text-sm font-normal text-white mb-7">Masukkan informasi pendaftaran yang valid.</p>
          <div class="flex items-center bg-white border-2 py-2 px-3 rounded-2xl mb-4">
          <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
              <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
          </svg>

              <input class="pl-2 outline-none border-none" type="text" name="username" id="username" placeholder="Username" required />
          </div>
          <div class="flex items-center bg-white border-2 py-2 px-3 rounded-2xl mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
              </svg>
              <input class="pl-2 outline-none border-none" type="email" name="email" id="email" placeholder="Email Address" required />
          </div>
          <div class="flex items-center bg-white border-2 py-2 px-3 rounded-2xl">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
              </svg>
              <input class="pl-2 outline-none border-none" type="text" name="password" id="" placeholder="Password" required />
          </div>
          <button type="submit" class="block w-full bg-[#3FC43B] mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Daftar</button>
          <p class="text-white text-sm ml-2 ">Sudah Memiliki Akun? <a href="login.php" class="font-bold text-[#3FC43B] cursor-pointer">Langsung Masuk Aja!</a></p>
        </form>
    </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ambil status, pesan, dan redirect dari PHP (jika ada)
        const status = "<?php echo $_SESSION['status'] ?? ''; ?>";
        const message = "<?php echo $_SESSION['message'] ?? ''; ?>";
        const redirect = "<?php echo $_SESSION['redirect'] ?? ''; ?>";
        console.log({ status, message, redirect });
        // Reset session agar pesan hanya muncul sekali
        <?php unset($_SESSION['status'], $_SESSION['message'], $_SESSION['redirect']); ?>

        // Tampilkan SweetAlert jika status dan pesan ada
        if (status && message) {
            Swal.fire({
                icon: status, // 'success' atau 'error'
                title: status === 'success' ? 'Berhasil' : 'Gagal',
                text: message,
            }).then(() => {
                if (status === 'success' && redirect) {
                    window.location.href = redirect; // Redirect setelah alert sukses
                }
            });
        }
    });
</script>
<?php  unset($_SESSION['status'], $_SESSION['message'], $_SESSION['redirect']); ?>

</html>