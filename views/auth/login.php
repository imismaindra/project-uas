<?php
$status = $_SESSION['status'] ?? null;
$message = $_SESSION['message'] ?? null;
$redirect = $_SESSION['redirect'] ?? null;

unset($_SESSION['status'], $_SESSION['message'], $_SESSION['redirect']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Rusdi Store</title>
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
<div class="h-screen flex flex-col md:flex-row">
        <!-- Bagian Kiri -->
        <div class="hidden md:flex flex-1 bg-gradient-to-tr from-[#1A1B41] to-[#3FC43B] justify-center items-center px-4 py-8 md:px-10">
            <div class="text-center md:text-left">
                <h1 class="text-white font-bold text-3xl md:text-4xl font-sans">Mas Rusdi Store</h1>
                <p class="text-white mt-2 md:mt-1 text-sm md:text-base">The most popular Gaming Store at SEA</p>
                <button type="button" class="block w-full md:w-28 bg-white text-[#1A1B41] mt-6 py-2 rounded-2xl font-semibold">
                    Back to Store
                </button>
            </div>
        </div>

        <!-- Bagian Kanan -->
        <div class="flex-1 flex justify-center items-center bg-[#1A1B41] px-4 py-8 md:px-10">
            <form method="post" action="/auth/checklogin" class="w-full max-w-md bg-[#1A1B41]">
                <h1 class="text-white font-bold text-xl md:text-2xl mb-1 text-center md:text-left">Hello Again!</h1>
                <p class="text-sm font-normal text-white mb-6 text-center md:text-left">Welcome Back</p>
                
                <!-- Input Email -->
                <div class="flex items-center bg-white border-2 py-2 px-3 rounded-2xl mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                    <input class="pl-2 outline-none border-none w-full" type="email" name="email" id="email" placeholder="Email Address" required />
                </div>

                <!-- Input Password -->
                <div class="flex items-center bg-white border-2 py-2 px-3 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                    <input class="pl-2 outline-none border-none w-full" type="password" name="password" id="password" placeholder="Password" required />
                </div>

                <!-- Tombol Login -->
                <button type="submit" class="block w-full bg-[#3FC43B] mt-6 py-2 rounded-2xl text-white font-semibold">Login</button>

                <!-- Tautan Registrasi -->
                <p class="text-white text-sm text-center mt-4">
                    Belum Memiliki Akun? <a href="/auth/register" class="font-bold text-[#3FC43B]">Register Dulu Yuk!</a>
                </p>
            </form>
        </div>
    </div>
</body>
<!-- SweetAlert -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const status = "<?php echo $status; ?>";
        const message = "<?php echo $message; ?>";
        const redirect = "<?php echo $redirect; ?>";

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
</html>