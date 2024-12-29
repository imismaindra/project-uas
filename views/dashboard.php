<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mas Rusdi TopUp Store</title>
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
            <h1 class="text-3xl font-bold mb-5">Dashboard</h1>
            <?php if($_SESSION['user']['role_id'] == 3):?>
                <div class="flex items-center justify-start gap-3 px-3 bg-[#1c1f2f] rounded-lg h-[55px] w-fit font-sans">
                    <div class="flex items-center justify-center w-7">
                        <svg viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect
                            x="0.539915"
                            y="6.28937"
                            width="21"
                            height="4"
                            rx="1.5"
                            transform="rotate(-4.77865 0.539915 6.28937)"
                            fill="#7D6B9D"
                            stroke="black"
                        ></rect>
                        <circle
                            cx="11.5"
                            cy="5.5"
                            r="4.5"
                            fill="#E7E037"
                            stroke="#F9FD50"
                            stroke-width="2"
                        ></circle>
                        <path
                            d="M2.12011 6.64507C7.75028 6.98651 12.7643 6.94947 21.935 6.58499C22.789 6.55105 23.5 7.23329 23.5 8.08585V24C23.5 24.8284 22.8284 25.5 22 25.5H2C1.17157 25.5 0.5 24.8284 0.5 24V8.15475C0.5 7.2846 1.24157 6.59179 2.12011 6.64507Z"
                            fill="#BF8AEB"
                            stroke="black"
                        ></path>
                        <path
                            d="M16 13.5H23.5V18.5H16C14.6193 18.5 13.5 17.3807 13.5 16C13.5 14.6193 14.6193 13.5 16 13.5Z"
                            fill="#BF8AEB"
                            stroke="black"
                        ></path>
                        </svg>
                    </div>

                    <div class="flex flex-col items-start justify-start gap-0 w-[120px]">
                        <span class="text-[8px] text-[#d6d6d6] font-light tracking-wider">Wallet balance</span>
                        <p class="text-[13.5px] text-white font-semibold tracking-wide">
                        <span id="currency">₹</span>890.12
                        </p>
                    </div>

                    <button class="flex items-center justify-center gap-1 px-4 py-[1px] text-[12px] text-white bg-[#c083eb] rounded-3xl border-none cursor-pointer transition-all duration-300 hover:bg-white hover:text-[#9c59cc]">
                        <span class="text-[20px] flex items-center justify-center">+</span>Add Money
                    </button>
                </div>
            <?php endif;?>
        </div>
    </div>
</body>
</html>
