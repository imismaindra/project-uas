
<?php 
    if (isset($_SESSION['user'])) {
    }
?>
<div class="navbar flex justify-between items-center bg-white p-4 shadow-lg fixed w-full z-10">
    <div class="flex items-center">
        <!-- Logo Section -->
        <svg height="35px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="35px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <path d="M377.8,100.1C332.9,86.8,318.8,112,256,112s-76.9-25.3-121.8-11.9c-44.9,13.3-67.3,60.4-88.5,148.8  c-21.2,88.5-17.3,152.4,7.7,164.3c25,11.9,53.2-15.4,80.1-49.1C155.3,337.7,166.2,336,256,336c89.7,0,99,0.7,122.5,28.1  c26.9,33.7,55.1,61,80.1,49.1c25-11.9,28.9-75.8,7.7-164.3C445.1,160.5,422.6,113.5,377.8,100.1z M128.2,263.7  c-21.7,0-39.3-17.7-39.3-39.6c0-21.8,17.6-39.6,39.3-39.6c21.7,0,39.3,17.8,39.3,39.6S149.9,263.7,128.2,263.7z M309.7,243.6  c-10.6,0-19.3-8.7-19.3-19.4c0-10.7,8.7-19.4,19.3-19.4c10.7,0,19.4,8.7,19.4,19.4C329,234.9,320.4,243.6,309.7,243.6z M351.9,286  c-10.6,0-19.3-8.7-19.3-19.4c0-10.8,8.7-19.4,19.3-19.4c10.7,0,19.4,8.7,19.4,19.4C371.3,277.4,362.6,286,351.9,286z M351.9,201.1  c-10.6,0-19.3-8.7-19.3-19.4c0-10.7,8.7-19.4,19.3-19.4c10.7,0,19.4,8.7,19.4,19.4C371.3,192.4,362.6,201.1,351.9,201.1z   M394.2,243.6c-10.7,0-19.3-8.7-19.3-19.4c0-10.7,8.7-19.4,19.3-19.4c10.6,0,19.3,8.7,19.3,19.4  C413.5,234.9,404.9,243.6,394.2,243.6z"/>
        </svg>
        <h1 class="text-xl font-bold ml-2 text-[#1D1242]">
            <a href="/views/wellcome.php"> TopUp Store</a>
        </h1>
    </div>
    <!-- User Section -->
    <div class="flex items-center space-x-4">
        <div class="text-right">
            <p class="text-sm font-semibold"><?php echo $_SESSION['user']['username']; ?></p>
            <p class="text-xs text-gray-500"><?php echo $_SESSION['user']['email']; ?></p>
        </div>
        <img src="https://i.pravatar.cc/150" alt="Foto Profil" class="w-10 h-10 rounded-full border border-gray-200">
    </div>
</div>