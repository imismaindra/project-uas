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
    <section id = "more-items" class="mx-[7.6rem] my-10">
        <h1 class="text-3xl font-bold my-5 text-white">Items Lainnya</h1>
        <div class="my-5 flex transform items-center gap-2 space-x-3 overflow-auto duration-300 ease-in-out">
        <a href="index.php?modul=store&filter=topup" class="text-black bg-[#3FC43B] font-bold rounded-lg text-sm px-5 py-2.5">Top-Up Games</a>
        <a href="index.php?modul=store&filter=joki" class="text-black bg-[#3FC43B] font-bold rounded-lg text-sm px-5 py-2.5 ">Joki</a>
        <a href="index.php?modul=store&filter=vocher" class="text-black bg-[#3FC43B] font-bold rounded-lg text-sm px-5 py-2.5 ">Vocher</a>
        </div>
        <?php include './views/components/moreitemscard.php'; ?>
    </section>

    <?php include './views/components/footer.php'; ?>
</body>
</html>