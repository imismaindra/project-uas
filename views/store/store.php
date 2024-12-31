
<?php 
    if (isset($_SESSION['user'])) {
       
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rusdi Store - TopUp paling murah se-Indonesia</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"rel="stylesheet">
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
                base: '#1A1B41',
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
<body class="bg-base font-poppins relative">
    <!-- Partikel Latar Belakang -->
    <div id="particles-js" class="absolute inset-0 z-0"></div>
    
    <!-- Konten Utama -->
    <div class="relative z-10">
        <?php include './views/components/navbar.php'; ?>
        <?php include './views/components/carousell.php'; ?>

        <section class="text-white md:mx-[5.5rem] px-4 md:px-8">
            <h1 class="text-3xl font-bold mb-5">Yang sedang Populer 🔥</h1>
            <div class="mt-5 grid grid-cols-2 gap-6 md:grid-cols-3 gap-6">
                <?php include './views/components/cards.php'; ?>
            </div>
        </section>

        <section id="more-items" class="mx-5 md:mx-[7.6rem] my-10">
            <h1 class="text-3xl font-bold my-5 text-white">Items Lainnya</h1>
            <div class="my-5 flex transform items-center gap-2 space-x-3 overflow-auto duration-300 ease-in-out">
                <a href="index.php?modul=store&filter=topup" class="text-black bg-[#3FC43B] font-bold rounded-lg text-sm px-5 py-2.5">Top-Up Games</a>
                <a href="index.php?modul=store&filter=joki" class="text-black bg-[#3FC43B] font-bold rounded-lg text-sm px-5 py-2.5">Joki</a>
                <a href="index.php?modul=store&filter=voucher" class="text-black bg-[#3FC43B] font-bold rounded-lg text-sm px-5 py-2.5">Voucher</a>
            </div>
            <?php include './views/components/moreitemscard.php'; ?>
        </section>

        <?php include './views/components/footer.php'; ?>
    </div>
</body>
<script>
    particlesJS('particles-js', {
        "particles": {
            "number": {
                "value": 100,
                "density": {
                    "enable": true,
                    "value_area": 800
                }
            },
            "color": {
                "value": "#ffffff"
            },
            "shape": {
                "type": "circle",
                "stroke": {
                    "width": 0,
                    "color": "#000000"
                },
                "polygon": {
                    "nb_sides": 5
                }
            },
            "opacity": {
                "value": 0.5,
                "random": false,
                "anim": {
                    "enable": false,
                    "speed": 1,
                    "opacity_min": 0.1,
                    "sync": false
                }
            },
            "size": {
                "value": 3,
                "random": true,
                "anim": {
                    "enable": false,
                    "speed": 40,
                    "size_min": 0.1,
                    "sync": false
                }
            },
            "line_linked": {
                "enable": true,
                "distance": 150,
                "color": "#ffffff",
                "opacity": 0.4,
                "width": 1
            },
            "move": {
                "enable": true,
                "speed": 3,
                "direction": "none",
                "random": false,
                "straight": false,
                "out_mode": "out",
                "bounce": false,
                "attract": {
                    "enable": false,
                    "rotateX": 600,
                    "rotateY": 1200
                }
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "repulse"
                },
                "onclick": {
                    "enable": true,
                    "mode": "push"
                },
                "resize": true
            },
            "modes": {
                "grab": {
                    "distance": 400,
                    "line_linked": {
                        "opacity": 1
                    }
                },
                "bubble": {
                    "distance": 400,
                    "size": 40,
                    "duration": 2,
                    "opacity": 8,
                    "speed": 3
                },
                "repulse": {
                    "distance": 200,
                    "duration": 0.4
                },
                "push": {
                    "particles_nb": 4
                },
                "remove": {
                    "particles_nb": 2
                }
            }
        },
        "retina_detect": true
    });
</script>

</html>