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
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>
<body class="bg-[#B5C2CA] font-poppins">
    <!-- Navbar -->
    <?php include 'components/navbar-admin.php'; ?>

    <div class="flex">
        <!-- Sidebar -->
        <?php include 'components/sidebar-admin.php'; ?>
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
                <form method="GET" action="index.php">
                    <input type="hidden" name="modul" value="transaction">
                    <input type="hidden" name="fitur" value="list">

                    <!-- Input Pencarian -->
                    <input type="text" name="search" placeholder="Cari transaksi" 
                        value="<?php echo htmlspecialchars(isset($_GET['search']) ? $_GET['search'] : ''); ?>" 
                        class="border rounded rounded-xl px-4 py-2">

                    <!-- Dropdown Filter Kategori -->
                    <select name="category_id" class="border rounded rounded-xl px-4 py-2">
                        <option value="">Semua Kategori</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo htmlspecialchars($category['id']); ?>" 
                                <?php echo (isset($_GET['category_id']) && $_GET['category_id'] == $category['id']) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($category['name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <!-- Tombol Submit -->
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Filter</button>
                </form>
            </div>

            <button type="button" class="px-3 py-2 text-sm mb-5 font-medium text-center inline-flex items-center text-white bg-[#1D1242] rounded-lg hover:bg-[#1D1242] focus:ring-4 focus:outline-none focus:ring-blue-300">
                <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
                </svg>
                <a href="index.php?modul=product&fitur=insert">New Transaction</a>
                
            </button>
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
                        <?php if (count($transaksis) > 0): ?>
                            <?php foreach ($transaksis as $tsk): ?>
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
                                        <!-- <a href="index.php?modul=product&fitur=edit&id=<?php echo htmlspecialchars($product['id']); ?>" class="text-gray-400 hover:text-gray-100 mx-2">
                                            <i class="material-icons-outlined text-blue-600">edit</i>
                                        </a> -->
                                        <a href="#" id="detailButton" data-id-transaksi="<?= $tsk['id']; ?>"  class="detailButton text-gray-400 hover:text-gray-100 mx-2">
                                            <i class="material-icons-outlined text-green-600">visibility</i>
                                        </a>
                                        <!-- <a href="#" 
                                        class="deleteButton text-gray-400 hover:text-gray-100 ml-2" 
                                        data-delete-url="index.php?modul=product&fitur=delete&id=<?php echo htmlspecialchars($product['id']); ?>">
                                            <i class="material-icons-round text-red-600">delete_outline</i>
                                        </a> -->
                                    </td>
                                </tr>
                            <?php endforeach; ?>
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
            <h2 class="invc text-lg font-bold mb-4">Loading..</h2>
            <label class="block mb-2 text-sm font-medium text-gray-900">Member: </label>
            <p class="member">Loading...</p>
            <label class="block mb-2 text-sm font-medium text-gray-900">Email: </label>
            <p class="email">Loading...</p>
            <label class="block mb-2 text-sm font-medium text-gray-900">Id Akun: </label>
            <p class="akun">Loading...</p>
            <label class="block mb-2 text-sm font-medium text-gray-900">Product: </label>
            <p class="product">Loading...</p>
            <label class="block mb-2 text-sm font-medium text-gray-900">Pembayaran: </label>
            <p class="payment">Loading...</p>
            <div class="flex justify-end mt-5">
                <button id="closeDetail" class="px-4 py-2 bg-red-500 text-white rounded mr-2 hover:bg-red-600">Batal</button>
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
            // AJAX Request untuk mendapatkan detail transaksi
            fetch(`index.php?modul=transaksi&fitur=get_detail&id=${id}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        // Isi data ke modal
                        document.querySelector("#detailModal .invc").textContent = "Detail Transaksi "+data.invoices;
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
                console.log(transaksi);
        }

        detailButtons.forEach(button => {
            button.addEventListener("click", function (e) {
                e.preventDefault();
                const transactionId = this.getAttribute("data-id-transaksi");
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
