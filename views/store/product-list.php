<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rusdi Store - TopUp paling murah se-Indonesia    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
</head>
<body class="bg-[#1A1B41]">
     <!-- navbar -->
     <?php include './views/components/navbar.php'; ?>
     <img alt="Mobile Legends" fetchpriority="high" width="1280" height="1280" decoding="async" data-img="1" 
     class="w-full h-56 md:h-72 lg:h-96 object-cover object-center" 
     src="https://i.ibb.co.com/mJmVkrG/mobile-legends.jpg" style="color: transparent;">
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
     <div class="container relative mt-8 grid grid-cols-2 gap-4 md:gap-8">
        <!-- Card -->
        <div class="rounded-xl bg-white px-4 pb-4 pt-2 shadow-2xl">
            <div class="prose prose-sm my-3 text-xs text-foreground prose-p:!m-0">
                <div>
                    <p>Top up Free Fire harga paling murah. Cara topup dm FF termurah :</p>
                    <ol>
                        <li>Masukkan ID</li>
                        <li>Pilih Nominal</li>
                        <li>Masukkan jumlah</li>
                        <li>Pilih Pembayaran</li>
                        <li>Tulis Kode Promo (jika ada)</li>
                        <li>Masukkan No WhatsApp</li>
                        <li>Klik Order Now &amp; lakukan Pembayaran</li>
                        <li>Diamond otomatis masuk ke akun game</li>
                    </ol>
                </div>
            </div>
        </div> 

        <!-- Form -->
        <form action="" class="col-auto col-start-1 flex flex-col gap-4 lg:col-auto lg:gap-8">
            <section class="relative scroll-mt-20 rounded-xl bg-card/50 shadow-2xl md:scroll-mt-[5.75rem] w-[45rem]" id="1">
                <div class="flex items-center overflow-hidden rounded-t-xl bg-[#53B950]">
                    <div class="flex h-10 w-10 items-center justify-center bg-primary font-semibold text-primary-foreground">1</div>
                    <h2 class="px-4 py-2 text-sm/6 font-semibold text-card-foreground">Masukkan Data Akun</h2>
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
        </form>
    </div>
      
    
</body>
</html>