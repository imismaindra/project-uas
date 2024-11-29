<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rusdi Store - TopUp paling murah se-Indonesia    </title>
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

</head>
<body class="bg-[#1A1B41]">
    <!-- navbar -->
    <?php include './views/components/navbar.php'; ?>
    <img alt="Mobile Legends" fetchpriority="high" width="1280" height="1280" decoding="async" data-img="1" class="w-full h-56 md:h-72 lg:h-96 object-cover object-center" src="https://i.ibb.co.com/mJmVkrG/mobile-legends.jpg" style="color: transparent;">
    <div class="bg-title-product flex min-h-32 w-full items-center border-b bg-transparent lg:min-h-[160px] bg-order-header-background text-order-header-foreground">
        <div class="container flex items-center gap-2">
            <div>
                <div class="flex items-start gap-4 ml-[7.5rem]">
                    <div class="product-thumbnail-container relative -top-28 md:ml-[10%]">
                        <img alt="" loading="lazy" width="300" height="300" decoding="async" data-nimg="1" class="z-20 -mb-14 aspect-square w-32 rounded-2xl object-cover shadow-2xl md:-mb-20 md:w-60" sizes="100vw" 
                        src=<?php echo $products[0]['category_image'];?>>
                    </div>
                </div>
            </div>
            <div class="py-4 sm:py-0">
                <h1 class="text-xs font-bold uppercase leading-7 tracking-wider sm:text-lg text-white">
                    <?php echo $products[0]['category_name']; ?>
                </h1>
                <p class="text-xs text-[#53B950] font-medium sm:text-base/6"><?php echo $products[0]['category_description']; ?></p>
                <div class="mt-4 flex flex-col gap-2 text-xs sm:flex-row sm:items-center sm:gap-8 sm:text-sm/6">
                    <div class="flex items-center gap-2">
                        <img alt="" loading="lazy" width="150" height="150" decoding="async" data-nimg="1" class="size-8" src="/assets/include/lightning.gif">
                        <span class="text-sm/7 font-medium text-[#53B950]">Proses Cepat</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <img alt="" loading="lazy" width="150" height="150" decoding="async" data-nimg="1" class="size-8" src="/assets/include/lightning.gif" style="color: transparent;">
                        <span class="text-sm/7 font-medium text-[#53B950]">Layanan Chat 24/7</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <img alt="" loading="lazy" width="150" height="150" decoding="async" data-nimg="1" class="size-8" src="/assets/include/lightning.gif" style="color: transparent;">
                        <span class="text-sm/7 font-medium text-[#53B950]">Diamonds</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="min-h-screen flex items-center justify-center mt-10 mb-10">
        <!-- Form -->
        <form action="POST" class="col-auto col-start-1 flex flex-col gap-4 lg:col-auto lg:gap-8">
            <section class="relative scroll-mt-20 rounded-xl bg-card/50 shadow-2xl md:scroll-mt-[5.75rem] w-[45rem]" id="1">
                <div class="flex items-center overflow-hidden rounded-t-xl bg-[#53B950]">
                    <div class="flex h-10 w-10 items-center justify-center bg-primary font-semibold text-primary-foreground">1</div>
                    <h2 class="px-4 py-2 text-sm/6 font-semibold text-white">Masukkan Data Akun</h2>
                </div>
                <div class="p-4">
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="id" class="block text-xs font-medium text-white pb-2">ID</label>
                                <div class="flex flex-col items-start">
                                    <input class="relative block w-full appearance-none rounded-lg border border-border bg-input px-3 py-2 text-xs text-white placeholder-muted-white focus:z-10 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary disabled:cursor-not-allowed disabled:opacity-75" type="number" id="id" name="id" min="0" placeholder="Ketikan ID" autocomplete="id" value="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center">
                                <input type="checkbox" class="h-4 w-4 cursor-pointer rounded border bg-background text-primary focus:ring-primary focus:ring-offset-background" id="save-inputs-to-cookie" checked value="true">
                                <label for="save-inputs-to-cookie" class="block text-xs font-medium text-white ml-3 block select-none text-sm text-white">Save Informasi Untuk Pembelian Berikut Nya</label>
                            </div>
                        </div>
                        <div class="text-xs text-white">
                            <div>
                                <p>
                                    <em>Untuk menemukan ID Pemain Anda, klik gambar avatar Anda di pojok kiri atas layar Anda. ID Pemain Anda akan ditampilkan di bawah nama pengguna Anda.</em>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="relative scroll-mt-20 rounded-xl bg-card/50 shadow-2xl md:scroll-mt-[5.75rem]" id="2">
                <div class="flex items-center overflow-hidden bg-[#53B950]  rounded-t-xl bg-card">
                    <div class="flex h-10 w-10 items-center justify-center  font-semibold text-primary-foreground">2</div>
                    <h2 class="px-4 py-2 text-sm/6 font-semibold text-white">Pilih Nominal</h2>
                </div>
                <div class="p-4">
                    <div class="flex flex-col space-y-4">
                        <section id="Top Up Instant">
                            <h3 class="pb-4 text-sm/6 text-[#53B950] font-semibold ">Top Up Instant</h3>
                            <div id="headlessui-radiogroup-:r10:" role="radiogroup" aria-labelledby="headlessui-label-:r11:">
                            <label class="sr-only" id="headlessui-label-:r11:" role="none">Select a variant list</label>
                            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-2 lg:grid-cols-3" role="none">
                                <?php foreach ($products as $diamond): ?>
                                <div class="relative flex cursor-pointer rounded-xl border border-transparent bg-white text-background shadow-sm outline-none md:p-4 bg-order-variant-background text-order-variant-foreground" id="headlessui-radiogroup-option-:r12:" role="radio" aria-checked="false" tabindex="0" data-headlessui-state="" aria-labelledby="headlessui-label-:r13:" aria-describedby="headlessui-description-:r14:">
                                    <span class="flex flex-1">
                                        <span class="flex flex-col justify-between">
                                        <span class="block text-xs font-semibold " id="headlessui-label-:r13:"><?php echo $diamond['name'];?></span>
                                        <div><span class="mt-1 flex items-center text-xs font-semibold" id="headlessui-description-:r14:">Rp&nbsp; <?php echo $diamond['price'];?></span></div>
                                        </span>
                                    </span>
                                    <div class="flex aspect-square w-8 items-center">
                                        <?php 
                                        if (isset($category_images[$products[0]['category_name']])): ?>
                                            <img 
                                                alt="<?= $products[0]['category_name']; ?>" 
                                                fetchpriority="high" 
                                                width="300" 
                                                height="300" 
                                                decoding="async" 
                                                data-nimg="1" 
                                                class="object-contain object-right" 
                                                sizes="80vh" 
                                                src="<?= $category_images[$products[0]['category_name']]; ?>" 
                                                style="color: transparent;">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </section>
                    </div>
                </div>
            </section>

            <section class="relative scroll-mt-20 rounded-xl bg-card/50 shadow-2xl shadow-[#53B950] md:scroll-mt-[5.75rem] w-[45rem]" id="3">
                <div class="flex items-center overflow-hidden rounded-t-xl bg-[#53B950]">
                    <div class="flex h-10 w-10 items-center justify-center bg-primary font-semibold text-primary-foreground">3</div>
                    <h2 class="px-4 py-2 text-sm/6 font-semibold text-white">Masukkan Jumlah Pemebelanjaan</h2>
                </div>
                <div class="p-4">
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="id" class="block text-xs font-medium text-white pb-2">ID</label>
                                <div class="flex flex-col items-start">
                                    <input class="relative block w-full appearance-none rounded-lg border border-border bg-input px-3 py-2 text-xs text-white placeholder-muted-white focus:z-10 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary disabled:cursor-not-allowed disabled:opacity-75" type="number" id="id" name="id" min="0" placeholder="Ketikan ID" autocomplete="id" value="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center">
                                <input type="checkbox" class="h-4 w-4 cursor-pointer rounded border bg-background text-primary focus:ring-primary focus:ring-offset-background" id="save-inputs-to-cookie" checked value="true">
                                <label for="save-inputs-to-cookie" class="block text-xs font-medium text-white ml-3 block select-none text-sm text-white">Save Informasi Untuk Pembelian Berikut Nya</label>
                            </div>
                        </div>
                        <div class="text-xs text-white">
                            <div>
                                <p>
                                    <em>Untuk menemukan ID Pemain Anda, klik gambar avatar Anda di pojok kiri atas layar Anda. ID Pemain Anda akan ditampilkan di bawah nama pengguna Anda.</em>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="relative scroll-mt-20 rounded-xl bg-card/50 shadow-2xl shadow-[#53B950] md:scroll-mt-[5.75rem] w-[45rem]" id="4">
                <div class="flex items-center overflow-hidden rounded-t-xl bg-[#53B950]">
                    <div class="flex h-10 w-10 items-center justify-center bg-primary font-semibold text-primary-foreground">4</div>
                    <h2 class="px-4 py-2 text-sm/6 font-semibold text-white">Pilih Pembayaran</h2>
                </div>
                <div class="p-4">
                <div class="flex flex-col gap-4" role="none">
                    <div class="relative flex cursor-pointer rounded-lg border bg-white border-transparent bg-foreground/75 p-2.5 text-background shadow-sm outline-none md:px-5 md:py-3" id="headlessui-radiogroup-option-:raa:" role="radio" aria-checked="false" tabindex="0" data-headlessui-state="">
                        <div class="flex w-full items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div><img src="https://client-cdn.bangjeff.com/xinnstore.com/meta/ICONNNNNNNNNNNNNN.png" alt="" class="max-h-12"></div>
                                <div>
                                    <div class="block text-xs font-semibold sm:text-sm">IndraPay</div>
                                </div>
                            </div>
                            <div>
                                <div class="relative mr-8 text-xs font-semibold sm:text-base">
                                    <span class="text-xs text-destructive">Max. Rp&nbsp; 0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section>

            <div class="relative scroll-mt-20 rounded-xl bg-card/50 shadow-2xl md:scroll-mt-[5.75rem] w-[45rem]">
                <div class="rounded-lg border border-dashed bg-secondary p-4 text-sm text-secondary-foreground">
                    <div class="text-center">Belum ada item produk yang dipilih.</div>
                </div>
                <button class="inline-flex items-center justify-center whitespace-nowrap text-xs font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-[#53B950] text-primary-foreground hover:bg-primary/90 h-8 rounded-md px-3 w-full gap-2" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-bag h-4 w-4"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path><path d="M3 6h18"></path><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                    <span>Pesan Sekarang!</span>
                </button>
            </div>
        </form>
    </div>
    <?php include 'views/components/footer.php';?>
</body>
</html>