<nav x-data="{ scrolled: false, showDropdown: false }" 
     x-on:scroll.window="scrolled = (window.pageYOffset > 0)" 
     :class="scrolled ? 'bg-opacity-70 backdrop-blur-md' : 'bg-opacity-100'" 
     class="sticky top-0 bg-[#1A1B41] z-50 transition-all duration-300 shadow shadow-xl">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
      <span class="self-center text-2xl font-bold whitespace-nowrap text-[#3FC43B]">TOP-UP GAME</span>
    </a>
    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <?php if(isset($_SESSION['user'])):?>
      <div class="akun relative" x-data="{ showDropdown: false }">
        <!-- Akun Info -->
        <div class="flex items-center space-x-4 cursor-pointer" @click="showDropdown = !showDropdown">
          <div class="text-right">
            <p class="text-sm text-[#3FC43B] font-semibold"><?php echo $_SESSION['user']['username']; ?></p>
            <p class="text-xs text-white"><?php echo $_SESSION['user']['email']; ?></p>
          </div>
          <img src="https://i.pravatar.cc/150" alt="Foto Profil" class="w-10 h-10 rounded-full border border-gray-200">
        </div>
        <!-- Dropdown Menu -->
        <div x-show="showDropdown" 
             @click.outside="showDropdown = false" 
             x-transition 
             class="absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg py-2">
          <a href="index.php?modul=auth&fitur=logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
          <a href="index.php?modul=dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
        </div>
      </div>
      <?php else:?>
        <a href="views/login.php" type="button"  class="text-white hover:text-white border border-white hover:bg-black-200 focus:ring-4 focus:outline-none focus:ring-[#3FC43B] font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Login</a>
        <button type="button" class="text-black bg-[#3FC43B] hover:bg-[#53B950] font-medium rounded-lg text-sm px-4 py-2 text-center text-sm px-5 py-2.5 text-center me-2 mb-2">Daftar</button>
      <?php endif;?>  
      <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-cta" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0  ">
        <li>
          <a href="index.php" class="block py-2 px-3 md:p-0 text-white bg-[#3FC43B] rounded md:bg-transparent md:text-[#3FC43B]" aria-current="page">Top-up</a>
        </li>
        <li>
          <a href="index.php?modul=transaksi&fitur=invoice " class="block py-2 px-3 md:p-0 text-white rounded hover:bg-[#3FC43B] md:hover:bg-transparent md:hover:text-[#3FC43B]">Transaksi</a>
        </li>
        <li>
          <a href="index.php?modul=leaderboard" class="block py-2 px-3 md:p-0 text-white rounded hover:bg-[#3FC43B] md:hover:bg-transparent md:hover:text-[#3FC43B]">Leaderboard</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 md:p-0 text-white rounded hover:bg-[#3FC43B] md:hover:bg-transparent md:hover:text-[#3FC43B]">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
