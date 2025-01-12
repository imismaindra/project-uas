<?php
if (!isset($_SESSION['user']['role_id'])) {
    // Redirect ke halaman login jika session role_id belum diatur
    header('Location: login.php');
    exit;
}
$role_id = $_SESSION['user']['role_id'];
?>
<div class="h-[86%] py-4 px-4 mt-20 ml-3 rounded-xl bg-[#1D1242] text-white w-64 fixed top-0 left-0 flex flex-col justify-between">
    
    <!-- Menu Items -->
    <ul class="space-y-4 flex-1">
        <!-- Menu Dashboard (Selalu tampil) -->
        <li class="flex items-center pl-6 py-2 hover:rounded-lg hover:bg-[#EFDFF5] hover:text-[#1D1242]">
            <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path d="M5 8a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3H8a3 3 0 0 1-3-3V8Zm4 2a1 1 0 0 0-1 1v4a1 1 0 1 0 2 0v-4a1 1 0 0 0-1-1Zm4 0a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2h-2Zm0 3a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2h-2Z"/></svg>
            <span> 
                <a href="/dashboard">Dashboard</a>
            </span>
        </li>

        <?php if ($role_id != 3): ?>
        <!-- Menu Roles, Users, Categories, Products, Members (Tampil jika role_id bukan 3) -->
        <li class="flex items-center pl-6 py-2 hover:rounded-lg hover:bg-[#EFDFF5] hover:text-[#1D1242]">
            <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path d="M5 8a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3H8a3 3 0 0 1-3-3V8Zm4 2a1 1 0 0 0-1 1v4a1 1 0 1 0 2 0v-4a1 1 0 0 0-1-1Zm4 0a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2h-2Zm0 3a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2h-2Z"/></svg>
            <span> 
                <a href="/role/list">Roles</a>
            </span>
        </li>
        <li class="flex items-center pl-6 py-2 hover:rounded-lg hover:bg-[#EFDFF5] hover:text-[#1D1242]">
            <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path d="M5 8a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3H8a3 3 0 0 1-3-3V8Zm4 2a1 1 0 0 0-1 1v4a1 1 0 1 0 2 0v-4a1 1 0 0 0-1-1Zm4 0a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2h-2Zm0 3a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2h-2Z"/></svg>
            <span> 
                <a href="/user/list">Users</a>
            </span>
        </li>
        <li class="flex items-center pl-6 py-2 text-gray-300 hover:rounded-lg hover:bg-[#EFDFF5] hover:text-[#1D1242]">
            <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2a8 8 0 0 1 8 8v1.742c.714.385 1.28 1.02 1.644 1.807A4 4 0 0 1 18 20h-4a3 3 0 0 1-3-3v-1a1 1 0 0 0-2 0v1a3 3 0 0 1-3 3H4a4 4 0 0 1-3.644-6.451c.365-.787.93-1.422 1.644-1.807V10a8 8 0 0 1 8-8ZM7 11a5 5 0 0 0 10 0V9a5 5 0 0 0-10 0v2Z"/></svg>
            <span><a href="/category/list">Categories</a></span>
        </li>
        <li class="flex items-center pl-6 py-2 text-gray-300 hover:text-white">
            <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path d="M3 3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v5.016A6.98 6.98 0 0 0 12 8H6a1 1 0 0 1 0-2h6c1.307 0 2.418-.835 2.83-2H4v10h3a1 1 0 0 1 0 2H4a1 1 0 0 1-1-1V3Zm14 7a5 5 0 0 1 0 10h-4a1 1 0 1 1 0-2h4a3 3 0 1 0 0-6h-2a1 1 0 1 1 0-2h2Z"/></svg>
            <span><a href="/product/list">Products</a></span>
        </li>
        <li class="flex items-center pl-6 py-2 text-gray-300 hover:text-white">
            <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path d="M19 2H5a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3Zm-7 3a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0V6a1 1 0 0 1 1-1Zm0 10a1.5 1.5 0="1 1 1-2Z"/></svg>
            <span><a href="/transaksi/list">Transaksi</a></span>
        </li>
        <li class="flex items-center pl-6 py-2 text-gray-300 hover:text-white">
            <svg class="w-5 h-5 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2"/>
            </svg>
            <span><a href="/member/list">Members</a></span>
        </li>
        <?php elseif($role_id == 3):?>
        <li class="flex items-center pl-6 py-2 text-gray-300 hover:text-white">
            <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path d="M19 2H5a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3Zm-7 3a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0V6a1 1 0 0 1 1-1Zm0 10a1.5 1.5 0="1 1 1-2Z"/></svg>
            <span><a href="/transaksi/list">Transaksi</a></span>
        </li>

        <li class="flex items-center pl-6 py-2 text-gray-300 hover:text-white">
            <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path d="M19 2H5a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3Zm-7 3a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0V6a1 1 0 0 1 1-1Zm0 10a1.5 1.5 0="1 1 1-2Z"/></svg>
            <span><a href="/">Store</a></span>
        </li>
        <?php endif; ?>
    </ul>

    <!-- Log-out at the bottom -->
    <div class="mt-auto hover:cursor-pointer ">
        <li class="flex items-center pl-6 py-2 text-gray-300 hover:text-white font-bold">
            <svg class="w-5 h-5 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2"/>
            </svg>
            <a href="auth/logout">Log-out</a>
        </li>
    </div>
</div>
