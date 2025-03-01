    <?php
    require_once __DIR__ . '../../../services/ExportPDFService.php';

    if (isset($_GET['export_pdf'])) {
        $filter = isset($_GET['filter']) ? $_GET['filter'] : 'Semua';
        $transactions = $transactionModel->getFilteredTransactions($filter);
        var_dump($transactions);
        global $conn;  // If using a global connection variable
        $exportService = new ExportPDFService($conn);
        $exportService->export($transactions, $filter);
        exit;
    }
    ?>
    <?php
        $message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
        unset($_SESSION['message']);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TopUp Store - Transactions</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
            rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">            
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
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
        <?php include './views/components/navbar-admin.php'; ?>

        <div class="flex">
            <!-- Sidebar -->
            <?php include './views/components/sidebar-admin.php'; ?>
            <!-- Main Content -->
            <div class="flex-1 ml-72 mt-20 p-8">
            <?php if ($message): ?>
                <div 
                    x-data="{ show: true }" 
                    x-show="show"
                    x-init="setTimeout(() => show = false, 3000)" 
                    class="fixed top-5 right-5 z-50 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg">
                    <?= htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>
                <h1 class="text-3xl font-bold mb-5">Transactions</h1>

                <div class="mb-4">
                </div>
                <form method="GET" action="/transaksi/export_pdf" target="_blank" class="mb-4">
                        <input type="hidden" name="modul" value="transaksi">
                        <input type="hidden" name="fitur" value="export_pdf">

                        <select name="status" class="border rounded px-4 py-2">
                            <option value="">Semua Status</option>
                            <option value="1">Paid</option>
                            <option value="0">Unpaid</option>
                        </select>

                        <select name="timeframe" class="border rounded px-4 py-2">
                            <option value="">Semua Waktu</option>
                            <option value="week">Minggu Ini</option>
                            <option value="month">Bulan Ini</option>
                            <option value="year">Tahun Ini</option>
                        </select>
                                            
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                            <i class="fas fa-filter"></i>
                        </button>
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">
                            <i class="fas fa-file-pdf"></i>
                        </button>
                        <!-- <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">
                            <i class="fas fa-file-excel"></i>
                        </button>     -->
                    </form>

                <div class="relative overflow-x-auto shadow-md">
                    
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                        <thead class="text-xs text-white uppercase bg-[#1D1242]">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Id
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Product
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Quantity
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $uid = $_SESSION['user']['id']; ?>
                            <?php if (count($transaksis) > 0): ?>
                                <?php if(!isset($_SESSION['user']['role_id'])||  $_SESSION['user']['role_id'] == 1):?>
                                    <?php foreach ($transaksis as $tsk): ?>
                                            <?php //echo $tsk['id'];?>
                                            <?php $product= $this->productModel->getProductById($tsk['product_id']);?>

                                        <tr class="bg-white border-b hover:bg-gray-50">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                <?php echo htmlspecialchars($tsk['id']); ?>
                                            </th>
                                            <td class="px-6 py-4">
                                                <?php echo htmlspecialchars($product['name']); ?>
                                            </td>
                                            <td class="px-6 py-4">
                                                <?php echo htmlspecialchars($tsk['amount']); ?>
                                            </td>
                                            <td class="px-6 py-4">
                                            Rp&nbsp;<?php echo htmlspecialchars($tsk['total_price']); ?>
                                            </td>
                                            <td id="status-update" class="status-update px-6 py-4 hover:cursor-pointer"  data-update-url="/transaksi/update/<?php echo htmlspecialchars($tsk['id']); ?>">
                                                <span class="<?php echo  $tsk['status'] == 1 ? 'bg-green-400' : 'bg-yellow-200 text-yellow-600'; ?> text-gray-50 rounded-md px-2">
                                                    <?php echo htmlspecialchars( $tsk['status'] == 1 ? "Paid" : "Unpaid") ?>
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-right">
                                                <a href="#" id="detailButton" data-id-transaksi="<?= $tsk['id']; ?>"  class="detailButton text-gray-400 hover:text-gray-100 mx-2">
                                                    <i class="material-icons-outlined text-green-600">visibility</i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else:?>
                                    <?php $tskuserid = $transaksiModel->getAllTransaksiByUserId( $uid);?>
                                    <?php foreach ($tskuserid as $tsk): ?>
                                        
                                        <?php $product= $productModel->getProductById($tsk['product_id']);?>

                                        <tr class="bg-white border-b hover:bg-gray-50">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                <?php echo htmlspecialchars($tsk['id']); ?>
                                            </th>
                                            <td class="px-6 py-4">
                                                <?php echo htmlspecialchars($product['name']); ?>
                                            </td>
                                            <td class="px-6 py-4">
                                                <?php echo htmlspecialchars($tsk['amount']); ?>
                                            </td>
                                            <td class="px-6 py-4">
                                            Rp&nbsp;<?php echo htmlspecialchars($tsk['total_price']); ?>
                                            </td>
                                            <td id="status-update" class="status-update px-6 py-4 hover:cursor-pointer"  data-update-url="index.php?modul=transaksi&fitur=update&id=<?php echo htmlspecialchars($tsk['id']); ?>">
                                                <span class="<?php echo  $tsk['status'] == 1 ? 'bg-green-400' : 'bg-yellow-200 text-yellow-600'; ?> text-gray-50 rounded-md px-2">
                                                    <?php echo htmlspecialchars( $tsk['status'] == 1 ? "Paid" : "Unpaid") ?>
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-right">
                                                <a href="#" id="detailButton" data-id-transaksi="<?= $tsk['id']; ?>"  class="detailButton text-gray-400 hover:text-gray-100 mx-2">
                                                    <i class="material-icons-outlined text-green-600">visibility</i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center text-gray-500 py-4">Tidak ada produk yang ditemukan.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>    

                    </table>
                </div>
                <!-- <div class="mt-4">
                    <nav>
                        <ul class="inline-flex items-center">
                            <?php if ($page > 1): ?>
                                <li>
                                    <a href="?modul=product&fitur=list&page=<?php echo $page - 1; ?>&search=<?php echo htmlspecialchars($search ?? ''); ?>&category_id=<?php echo htmlspecialchars($category_id ?? ''); ?>" 
                                    class="px-3 py-2 bg-gray-200 hover:bg-gray-300 rounded-l">Previous</a>
                                </li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li>
                                    <a href="?modul=product&fitur=list&page=<?php echo $i; ?>&search=<?php echo htmlspecialchars($search ?? ''); ?>&category_id=<?php echo htmlspecialchars($category_id ?? ''); ?>" 
                                    class="px-3 py-2 <?php echo ($i == $page) ? 'bg-blue-500 text-white' : 'bg-gray-200 hover:bg-gray-300'; ?> rounded"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>

                            <?php if ($page < $totalPages): ?>
                                <li>
                                    <a href="?modul=product&fitur=list&page=<?php echo $page + 1; ?>&search=<?php echo htmlspecialchars($search ?? ''); ?>&category_id=<?php echo htmlspecialchars($category_id ?? ''); ?>" 
                                    class="px-3 py-2 bg-gray-200 hover:bg-gray-300 rounded-r">Next</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div> -->

            </div>
        </div>
        <!-- Tambahkan modal di akhir body -->
        <div id="updateModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
                <h2 class="text-lg font-bold mb-4">Update Status Transaksi</h2>
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="0" <?php echo $transaksis[0]['status'] == 0 ? 'selected' : ''; ?>>Unpaid</option>
                    <option value="1" <?php echo $transaksis[0]['status'] == 1 ? 'selected' : ''; ?>>Paid</option>
                    <option value="2" <?php echo $transaksis[0]['status'] == 2 ? 'selected' : ''; ?>>Trouble</option>
                </select>
                <div class="flex justify-end mt-5">
                    <button id="cancelUpdate" class="px-4 py-2 bg-red-500 text-white rounded mr-2 hover:bg-red-600">Batal</button>
                    <a id="confirmUpdate" href="#" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Update Status</a>
                </div>
            </div>
        </div>
        <div id="detailModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
                <div class="flex justify-between items-center border-b pb-3 mb-4">
                    <h2 class="text-xl font-semibold text-gray-800">Detail Transaksi</h2>
                    <button id="closeDetail" class="text-gray-400 hover:text-gray-600">
                        ✖
                    </button>
                </div>
                <h2 class="invc text-lg font-bold mb-4">Loading..</h2>
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Member</label>
                        <p class="member text-gray-800 font-semibold">Loading...</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Email</label>
                        <p class="email text-gray-800 font-semibold">Loading...</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Id Akun</label>
                        <p class="akun text-gray-800 font-semibold">Loading...</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Product</label>
                        <p class="product text-gray-800 font-semibold">Loading...</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Pembayaran</label>
                        <p class="payment text-gray-800 font-semibold">Loading...</p>
                    </div>
                </div>
            </div>
        </div>


    <!-- Script untuk menangani modal -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const modal = document.getElementById("updateModal");
            const cancelBtn = document.getElementById("cancelUpdate");
            const closeBtn = document.getElementById("closeDetail");
            const confirmLink = document.getElementById("confirmUpdate");
            const statusSelect = document.getElementById("status");

            const modalDetail = document.getElementById("detailModal"); 
            const updateButtons = document.querySelectorAll(".status-update");
            const detailButtons = document.querySelectorAll(".detailButton");
            function openDetailModal(id) {
                fetch(`/transaksi/detail/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            alert(data.error);
                        } else {
                            // Isi data ke modal
                            document.querySelector("#detailModal .invc").textContent = data.invoices;
                            document.querySelector("#detailModal .member").textContent = data.user_id || "Guest";
                            document.querySelector("#detailModal .email").textContent = data.guest_email || "-";
                            document.querySelector("#detailModal .akun").textContent = data.akungame_Id;
                            document.querySelector("#detailModal .product").textContent = data.product_id;
                            document.querySelector("#detailModal .payment").textContent = data.payment_method;

                            // Tampilkan modal
                            modalDetail.classList.remove("hidden");
                        }
                    })
                    .catch(error => {
                        console.error("Error fetching detail:", error);
                        alert("Gagal mengambil data transaksi.");
                    });
                    // console.log(transaksi);
            }

            detailButtons.forEach(button => {
                button.addEventListener("click", function (e) {
                    // alert("clicked");
                    e.preventDefault();
                    const transactionId = this.getAttribute("data-id-transaksi");
                    // alert(transactionId);
                    openDetailModal(transactionId);
                });
            });

            closeBtn.addEventListener("click", function () {
                modalDetail.classList.add("hidden");
            });
            updateButtons.forEach(button => {
                button.addEventListener("click", function (e) {
                    e.preventDefault();
                    const updateUrl = button.getAttribute("data-update-url");
                    confirmLink.setAttribute("data-base-url", updateUrl);
                    modal.classList.remove("hidden");
                });
            });
            confirmLink.addEventListener("click", function (e) {
                e.preventDefault();
                const selectedStatus = statusSelect.value;
                const baseUrl = confirmLink.getAttribute("data-base-url");
                const finalUrl = `${baseUrl}&status=${selectedStatus}`;
                window.location.href = finalUrl; // Arahkan ke URL dengan status
            });
            cancelBtn.addEventListener("click", function () {
                modal.classList.add("hidden");
            });
        });

    </script>
    </body>
    </html>
