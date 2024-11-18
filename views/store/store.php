<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rusdi Store - TopUp paling murah se-Indonesia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>


</head>
<body class="bg-[#1A1B41]">
    <!-- navbar -->
    <?php include './views/components/navbar.php'; ?>
    <!-- carousell -->
    <?php include './views/components/carousell.php'; ?>
    <!-- content -->
     <section class=" text-white ml-[5.5rem] px-4 md:px-8">
        <h1 class="text-3xl font-bold mb-5">Yang sedang Populer 🔥</h>
        <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <?php include './views/components/cards.php'; ?>
        </div>
    </section>

</body>
</html>