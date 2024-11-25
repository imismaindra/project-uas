<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rusdi Store - TopUp paling murah se-Indonesia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.3/dist/cdn.min.js"></script>


</head>
<body class="bg-[#1A1B41]">
    <!-- navbar -->
    <?php include './views/components/navbar.php'; ?>
    <!-- carousell -->
    <?php include './views/components/carousell.php'; ?>
    <!-- content -->
     <section class=" text-white mx-[5.5rem] px-4 md:px-8">
        <h1 class="text-3xl font-bold mb-5">Yang sedang Populer 🔥</h>
        <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <?php include './views/components/cards.php'; ?>
        </div>
    </section>
    <section class="mx-[7.6rem] my-10">
        <h1 class="text-3xl font-bold my-5 text-white">Items Lainnya</h1>
        <div class="my-5 flex transform items-center gap-2 space-x-3 overflow-auto duration-300 ease-in-out">
            <a href="#" class="text-black bg-[#3FC43B] font-medium rounded-lg text-sm px-5 py-2.5 ">Read more</a>
            <a href="#" class="text-black bg-[#3FC43B] font-medium rounded-lg text-sm px-5 py-2.5 ">Read more</a>
            <a href="#" class="text-black bg-[#3FC43B] font-medium rounded-lg text-sm px-5 py-2.5 ">Read more</a>
        </div>
        <div class="mb-4 grid grid-cols-3 gap-4 sm:mb-8 sm:grid-cols-4 sm:gap-x-6 sm:gap-y-8 lg:grid-cols-5 xl:grid-cols-6">
            <a tabindex="0" href="/id-id/mobile-legends?from=aHR0cHM6Ly93d3cub3VyYXN0b3JlLmNvbS9pZC1pZD9fX2NmX2NobF90az1qUDZ1bVVyVlBBd2h3N2dVNk95ZWtHOXVVbGhJdFZqNjNmb2JBMWp6eTZzLTE3MzE3NjEyNzgtMS4wLjEuMS1oRGtDdTA5R1VZRGRLUU5oSUVlMkI4NXRlbnFTcGpjWWRZVk5mUFF5VGRR" 
                style="outline: none; opacity: 1; transform: none;">
                <div 
                    class="group relative transform overflow-hidden rounded-2xl bg-gray-200 duration-300 
                    ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-[#3FC43B] hover:ring-offset-2 hover:ring-offset-gray-100">
                    <img  alt="Mobile Legends"  src="https://cdn.ourastore.com/cc355cc5-83f1-4691-aec1-b879f9c5c2a4.jpg"class="w-full h-full object-cover object-center" />
                    <article 
                    class="absolute inset-x-0 -bottom-10 z-10 flex transform flex-col px-3 transition-all duration-300 ease-in-out group-hover:bottom-3 sm:px-4 group-hover:sm:bottom-4"
                    >
                    <h2 class="truncate text-sm font-semibold text-gray-900 sm:text-base">
                        Mobile Legends
                    </h2>
                    <p class="truncate text-xs text-gray-700 sm:text-sm">
                        Moonton
                    </p>
                    </article>
                    <div class="absolute inset-0 transform bg-gradient-to-t from-transparent transition-all duration-300 group-hover:from-[#3FC43B]"
                    ></div>
                </div>
            </a>
            
        </div>
    </section>

    <?php include './views/components/footer.php'; ?>
</body>
</html>