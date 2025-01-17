<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(!empty($transaksibyInvoices[0]['invoices'])): ?>
        <title>Invoice <?php echo $transaksibyInvoices[0]['invoices'] ?></title>
    <?php else:?>
        <title>Cari Transaksi - Mas Rusdi Store</title>
    <?php endif;?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"rel="stylesheet">
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
<body class="bg-[#1A1B41] font-poppins">
    <!-- navbar -->
    <?php include './views/components/navbar.php'; ?>
    <!-- content -->
    <?php if (isset($transaksibyInvoices) && !empty($transaksibyInvoices)): ?>
    <?php $products = $productModel->getProductById( $transaksibyInvoices[0]['product_id']); ?>
        
      <?php $categories = $categoryModel->getCategoryById( $products['id_catagories']);?>
        <section id="main" class="flex flex-col  my-10">
        <section class="bg-darkblue flex flex-col justify-center items-center py-10">
          <h2 class="text-center text-white text-xl font-bold mb-8">Progress Transaksi</h2>
          <ol class="items-center sm:flex">
              <!-- Step 1 -->
              <li class="relative mb-6 sm:mb-0">
                  <div class="flex items-center">
                      <div class="z-10 flex items-center justify-center w-10 h-10 bg-green-500 rounded-full ring-4 ring-green-300 shrink-0">
                          <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M16 8V4a4 4 0 1 0-8 0v4H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2h-2Zm-6 0V4a2 2 0 1 1 4 0v4H8Z" />
                          </svg>
                      </div>
                      <div class="hidden sm:flex w-full bg-green-500 h-0.5"></div>
                  </div>
                  <div class="mt-3 sm:pr-8 text-center sm:text-left">
                      <h3 class="text-lg font-bold text-green-500">Transaksi Dibuat</h3>
                      <p class="text-sm text-gray-300">Transaksi telah berhasil dibuat</p>
                  </div>
              </li>
              <!-- Step 2 -->
              <li class="relative mb-6 sm:mb-0">
                  <div class="flex items-center">
                      <div class="z-10 flex items-center justify-center w-10 h-10 bg-green-500 rounded-full ring-4 ring-green-300 shrink-0">
                          <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm-1-4h2V9h-2v5Zm0-6h2V7h-2v1Z" />
                          </svg>
                      </div>
                      <div class="hidden sm:flex w-full bg-green-500 h-0.5"></div>
                  </div>
                  <div class="mt-3 sm:pr-8 text-center sm:text-left">
                      <h3 class="text-lg font-bold text-green-500">Pembayaran</h3>
                      <p class="text-sm text-gray-300">Pembayaran telah kami terima, pesanan akan segera diproses</p>
                  </div>
              </li>
              <!-- Step 3 -->
              <li class="relative mb-6 sm:mb-0">
                  <div class="flex items-center">
                      <div class="z-10 flex items-center justify-center w-10 h-10 bg-green-500 rounded-full ring-4 ring-green-300 shrink-0">
                          <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M10 2a8 8 0 1 0 8 8 8 8 0 0 0-8-8Zm3.707 6.293a1 1 0 0 1 0 1.414l-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 11.586l3.293-3.293a1 1 0 0 1 1.414 0Z" />
                          </svg>
                      </div>
                      <div class="hidden sm:flex w-full bg-green-500 h-0.5"></div>
                  </div>
                  <div class="mt-3 sm:pr-8 text-center sm:text-left">
                      <h3 class="text-lg font-bold text-green-500">Sedang Di Proses</h3>
                      <p class="text-sm text-gray-300">Pembelian sedang dalam proses</p>
                  </div>
              </li>
              <!-- Step 4 -->
              <li class="relative mb-6 sm:mb-0">
                  <div class="flex items-center">
                      <div class="z-10 flex items-center justify-center w-10 h-10 bg-green-500 rounded-full ring-4 ring-green-300 shrink-0">
                          <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M10 2a8 8 0 1 0 8 8 8 8 0 0 0-8-8Zm3.707 6.293a1 1 0 0 1 0 1.414l-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 11.586l3.293-3.293a1 1 0 0 1 1.414 0Z" />
                          </svg>
                      </div>
                  </div>
                  <div class="mt-3 sm:pr-8 text-center sm:text-left">
                      <h3 class="text-lg font-bold text-green-500">Transaksi Selesai</h3>
                      <p class="text-sm text-gray-300">Transaksi telah berhasil dilakukan</p>
                  </div>
              </li>
          </ol>
        </section>

          <p class="text-white font-bold text-3xl text-center mb-4">
              Detail Invoice Kamu
          </p>
        <div class="container grid grid-cols-12 gap-y-8 md:gap-8">
            <div class="col-span-12 sm:col-span-8 md:col-span-6 ml-[6rem]">
                <div class="grid grid-cols-5 gap-4 rounded-3xl border border-border/25 bg-[#161934] p-4 md:grid-cols-4">
                    <a class="col-span-2 rounded-2xl duration-200 ease-in-out hover:ring-2 hover:ring-primary hover:ring-offset-2 hover:ring-offset-muted md:col-span-1" href="#" style="outline: none;">
                        <div class="relative aspect-square overflow-hidden rounded-t-2xl">
                           <img src="/<?php echo $categories['image'] ?>" class="object-cover object-center" alt="" sizes="100vw" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                        </div>
                        <div class="rounded-b-2xl bg-[#111827] px-3 pb-2.5 pt-1.5 text-center">
                        <h3 class="truncate text-xs font-semibold text-white"><?php echo $categories['name']; ?></h3>
                        <p class="truncate text-secondary text-[10px]"><?php echo $products['name']; ?></p>
                        </div>
                    </a>
                    <div class="col-span-3 text-sm font-medium">
                        <div class="pb-2 text-white font-semibold">Informasi Akun</div>
                        <div class="grid grid-cols-4 gap-2 pb-2">
                        <div class="truncate text-white">Email</div>
                        <div class="col-span-3 text-white">
                            <p class="break-words">: <?php echo $transaksibyInvoices[0]['guest_email']; ?></p>
                        </div>
                        </div>
                        <div class="grid grid-cols-4 gap-2 pb-2">
                        <div class="truncate text-white">ID</div>
                        <div class="col-span-3 text-white">
                            <p class="break-words">: <?php echo $transaksibyInvoices[0]['akungame_Id']; ?></p>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="pt-4">
                    <button class="inline-flex items-center justify-center whitespace-nowrap transition-all rounded-lg shadow-sm text-sm font-medium ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-transparent bg-secondary text-white hover:bg-secondary/80 h-9 px-4 py-2 w-full justify-between !border !border-border/25" id="headlessui-disclosure-button-:r2:" aria-expanded="true" data-headlessui-state="open" type="button" aria-controls="headlessui-disclosure-panel-:r3:">
                        <span>Rincian Pembayaran</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-up rotate-180 transform h-5 w-5 text-secondary-foreground print:text-black">
                        <path d="m18 15-6-6-6 6"></path>
                        </svg>
                    </button>
                    <div class="mt-2 rounded-lg border border-border/25 bg-secondary/50 p-4 text-sm" id="headlessui-disclosure-panel-:r3:" data-headlessui-state="open">
                        <dl class="space-y-4 text-sm">
                        <div class="flex justify-between">
                            <div class="font-medium text-white">Harga</div>
                            <div class="flex flex-col text-muted-foreground"><span>Rp&nbsp; <?php echo $products['price'];?></span></div>
                        </div>
                        <div class="flex justify-between">
                            <div class="font-medium text-white">Jumlah</div>
                            <div class="text-muted-foreground"><?php echo $transaksibyInvoices[0]['amount']; ?>x</div>
                        </div>
                        <div class="h-px w-full bg-background"></div>
                        <div class="flex justify-between">
                            <div class="font-medium text-white">Subtotal</div>
                            <div class="text-muted-foreground">Rp&nbsp; <?php echo $transaksibyInvoices[0]['total_price']-500; ?></div>
                        </div>
                        <div class="flex justify-between">
                            <div class="font-medium text-white">Biaya</div>
                            <div class="text-muted-foreground">Rp&nbsp; 500</div>
                        </div>
                        </dl>
                    </div>
                </div>
                <div class="mt-4 flex justify-between rounded-lg border border-border/25 bg-secondary/50 p-4">
                    <div class="font-medium text-white">Total Pembayaran</div>
                    <div class="flex items-center gap-2 font-bold text-muted-foreground">
                        <span>Rp&nbsp; <?php echo $transaksibyInvoices[0]['total_price']; ?></span>
                        <button type="button">
                            <svg width="20" height="20" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8233 6.28561H10.1766C9.42742 6.28561 8.82031 5.67849 8.82031 4.92933V4.35627C8.82031 3.60711 9.42742 3 10.1766 3H14.8233C15.5725 3 16.1796 3.60711 16.1796 4.35627V4.92933C16.1796 5.67849 15.5725 6.28561 14.8233 6.28561Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path opacity="0.4" d="M16.1793 4.59375C18.2526 4.59375 19.9338 6.27498 19.9338 8.34831V17.2458C19.9338 19.3191 18.2526 21.0004 16.1793 21.0004H8.81999C6.74666 21.0004 5.06543 19.3191 5.06543 17.2458V8.34831C5.06543 6.27498 6.74666 4.59375 8.81999 4.59375" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mt-4">
                    <button class="bg-secondary inline-flex items-center justify-center whitespace-nowrap transition-all rounded-lg shadow-sm text-sm font-medium ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-9 px-4 py-2 w-full gap-x-2" type="button">
                        <svg width="20" height="20" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.4046 20.9973H8.5882C5.7181 20.9973 3.51348 19.9602 4.13906 15.7864L4.86777 10.1298C5.24916 8.04682 6.58205 7.25 7.7476 7.25H17.2783C18.4613 7.25 19.7125 8.10617 20.1581 10.1298L20.8868 15.7864C21.418 19.4893 19.2757 20.9973 16.4046 20.9973Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path opacity="0.4" d="M16.5526 7.04542C16.5526 4.81161 14.742 3.00004 12.5072 3.00004C10.2734 2.99031 8.45407 4.79312 8.44434 7.02791C8.44434 7.03375 8.44434 7.03958 8.44434 7.04542" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path opacity="0.4" d="M15.2169 11.6797C15.2169 13.178 14.0027 14.3922 12.5044 14.3922C11.0071 14.399 9.78708 13.1897 9.78027 11.6914V11.6797" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span>Beli Lagi</span>
                    </button>
                </div>
            </div>
            <div class="col-span-12 text-white sm:col-span-4 md:col-span-6">
                <div>
                    <div>Metode Pembayaran</div>
                    <div class="font-semibold text-secondary"><?php echo $transaksibyInvoices[0]['payment_method']; ?></div>
                    <div class="flex flex-col gap-x-4 gap-y-6 pt-6">
                        <div class="grid grid-cols-12 gap-x-4 gap-y-1 md:gap-2">
                        <div class="col-span-12 pt-2 md:col-span-4 md:pt-0">Kode VA</div>
                        <div class="col-span-12 flex items-center gap-2 font-semibold md:col-span-8 text-secondary">
                            <span id="contact-details" ><?php echo $transaksibyInvoices[0]['kodeVA']; ?></span>
                            <button data-copy-to-clipboard-target="contact-details" data-copy-to-clipboard-content-type="textContent" data-tooltip-target="tooltip-contact-details" class="text-white dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg p-2 inline-flex items-center justify-center">
                                <span id="default-icon-contact-details">
                                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                        <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z"/>
                                    </svg>
                                </span>
                                <span id="success-icon-contact-details" class="hidden inline-flex items-center">
                                    <svg class="w-3.5 h-3.5 text-blue-700 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                    </svg>
                                </span>
                            </button>
                            <div id="tooltip-contact-details" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                <span id="default-tooltip-message-contact-details">Copy to clipboard</span>
                                <span id="success-tooltip-message-contact-details" class="hidden">Copied!</span>
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                        <div class="col-span-12 pt-2 md:col-span-4 md:pt-0">Nomor Invoice</div>
                        <div class="col-span-12 flex items-center gap-2 font-semibold md:col-span-8 text-secondary">
                            <span><?php echo $transaksibyInvoices[0]['invoices']; ?></span>
                            <button type="button">
                                <svg width="20" height="20" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8233 6.28561H10.1766C9.42742 6.28561 8.82031 5.67849 8.82031 4.92933V4.35627C8.82031 3.60711 9.42742 3 10.1766 3H14.8233C15.5725 3 16.1796 3.60711 16.1796 4.35627V4.92933C16.1796 5.67849 15.5725 6.28561 14.8233 6.28561Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path opacity="0.4" d="M16.1793 4.59375C18.2526 4.59375 19.9338 6.27498 19.9338 8.34831V17.2458C19.9338 19.3191 18.2526 21.0004 16.1793 21.0004H8.81999C6.74666 21.0004 5.06543 19.3191 5.06543 17.2458V8.34831C5.06543 6.27498 6.74666 4.59375 8.81999 4.59375" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </div>
                        <?php if($transaksibyInvoices[0]['status'] == 0): ?>
                            <div class="col-span-12 pt-2 md:col-span-4 md:pt-0">Status Pembayaran</div>
                            <div class="col-span-12 flex items-center gap-2 font-semibold md:col-span-8">
                                <span class="inline-flex rounded-sm px-2 text-xs font-semibold uppercase leading-5 print:p-0 bg-yellow-200 text-yellow-900">Unpaid</span>
                            </div>
                            <div class="col-span-12 pt-2 md:col-span-4 md:pt-0">Status Transaksi</div>
                            <div class="col-span-12 flex items-center gap-2 font-semibold md:col-span-8">
                                <spa class="inline-flex rounded-sm px-2 text-xs font-semibold uppercase leading-5 print:p-0 bg-yellow-200 text-yellow-900">On Prose</spa>
                            </div>
                            <div class="col-span-12 pt-2 md:col-span-4 md:pt-0">Pesan</div>
                                <div class="col-span-12 flex items-center gap-2 font-semibold md:col-span-8 text-yellow-200">Transaksi Belum Selesai</div>
                            </div>
                        <?php elseif($transaksibyInvoices[0]['status'] == 1): ?>
                            <div class="col-span-12 pt-2 md:col-span-4 md:pt-0">Status Pembayaran</div>

                            <div class="col-span-12 flex items-center gap-2 font-semibold md:col-span-8"><span class="inline-flex rounded-sm px-2 text-xs font-semibold uppercase leading-5 print:p-0 bg-emerald-200 text-emerald-900">Paid</span></div>
                            <div class="col-span-12 pt-2 md:col-span-4 md:pt-0">Status Transaksi</div>
                            <div class="col-span-12 flex items-center gap-2 font-semibold md:col-span-8">
                                <span class="inline-flex rounded-sm px-2 text-xs font-semibold uppercase leading-5 print:p-0 bg-emerald-200 text-emerald-900">Success</span>
                            </div>
                        <?php else: ?>
                            <div class="col-span-12 pt-2 md:col-span-4 md:pt-0">Status Pembayaran</div>

                            <div class="col-span-12 flex items-center gap-2 font-semibold md:col-span-8"><span class="inline-flex rounded-sm px-2 text-xs font-semibold uppercase leading-5 print:p-0 bg-emerald-200 text-emerald-900">Paid</span></div>
                            <div class="col-span-12 pt-2 md:col-span-4 md:pt-0">Status Transaksi</div>
                            <div class="col-span-12 flex items-center gap-2 font-semibold md:col-span-8"><spa class="inline-flex rounded-sm px-2 text-xs font-semibold uppercase leading-5 print:p-0 bg-emerald-200 text-emerald-900">Success</spa></div>
                        <?php endif; ?>
                       
                    </div>
                </div>
            </div>
            <div class="col-span-12">
                <div class="flex flex-col gap-2"></div>
            </div>
        </div>          
      </section>
    <?php else: ?>
      <section id="main" class="flex flex-col justify-center items-center my-10">
          <p class="text-white font-bold text-3xl text-center mb-4">
              Cek Invoice Kamu dengan Mudah dan Cepat
          </p>
          <p class="text-secondary font-semibold text-xl text-secondary text-center mb-6">
              Masukkan nomor invoice yang valid untuk melihat detail pembelian.
          </p>
          <form method="post" action= "/transaksi/checkinvoice/" id="invoiceForm" class="w-full max-w-md bg-[#161934] px-5 py-5 rounded rounded-xl">
              <label for="invoices" class="block mb-2 text-sm font-medium text-white">Cari detail pembelian kamu di sini
              </label>
              <input 
                  id="invoicesInput"
                  name="invoices"
                  type="text" 
                  class="w-full rounded-lg border border-secondary bg-[#262659] p-3 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-offset-2" 
                  placeholder="Masukkan nomor invoice kamu di sini" 
              />
              <button class="bg-secondary rounded rounded-lg font-semibold my-5 w-full" type="submit">
                  Cari Invoice
              </button>
          </form>
      </section>
    <?php endif; ?>
  
    <script>
      document.getElementById('invoiceForm').addEventListener('submit', function(event) {
          const invoiceValue = document.getElementById('invoicesInput').value;
          // Jika input tidak kosong, tambahkan ke action
          if (invoiceValue.trim() !== "") {
              this.action = `/transaksi/checkinvoice/${encodeURIComponent(invoiceValue)}`;
          } else {
              alert("Nomor invoice harus diisi!");
              event.preventDefault();
          }
      });
 

      
       
        window.addEventListener('load', function() {
            const clipboard = FlowbiteInstances.getInstance('CopyClipboard', 'contact-details');
            const tooltip = FlowbiteInstances.getInstance('Tooltip', 'tooltip-contact-details');

            const $defaultIcon = document.getElementById('default-icon-contact-details');
            const $successIcon = document.getElementById('success-icon-contact-details');

            const $defaultTooltipMessage = document.getElementById('default-tooltip-message-contact-details');
            const $successTooltipMessage = document.getElementById('success-tooltip-message-contact-details');

            clipboard.updateOnCopyCallback((clipboard) => {
                showSuccess();

                // reset to default state
                setTimeout(() => {
                    resetToDefault();
                }, 2000);
            })

            const showSuccess = () => {
                $defaultIcon.classList.add('hidden');
                $successIcon.classList.remove('hidden');
                $defaultTooltipMessage.classList.add('hidden');
                $successTooltipMessage.classList.remove('hidden');    
                tooltip.show();
            }

            const resetToDefault = () => {
                $defaultIcon.classList.remove('hidden');
                $successIcon.classList.add('hidden');
                $defaultTooltipMessage.classList.remove('hidden');
                $successTooltipMessage.classList.add('hidden');
                tooltip.hide();
            }
        })


    </script>
    <?php include './views/components/footer.php'; ?>
</body>
</html>