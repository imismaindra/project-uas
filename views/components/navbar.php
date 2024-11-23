<nav x-data="{ scrolled: false }" 
     x-on:scroll.window="scrolled = (window.pageYOffset > 0)" 
     :class="scrolled ? 'bg-opacity-70 backdrop-blur-md' : 'bg-opacity-100'" 
     class="sticky top-0 bg-[#1A1B41] z-50 transition-all duration-300">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
      <span class="self-center text-2xl font-semibold whitespace-nowrap text-[#63BF5F]">Top-up Game</span>
    </a>
    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <button type="button" class="text-white hover:text-white border border-white hover:bg-black-200 focus:ring-4 focus:outline-none focus:ring-[#63BF5F] font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Login</button>
      <button type="button" class="text-black bg-[#63BF5F] hover:bg-[#53B950] font-medium rounded-lg text-sm px-4 py-2 text-center text-sm px-5 py-2.5 text-center me-2 mb-2">Daftar</button>
      <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-cta" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-[#1A1B41]">
        <li>
          <a href="store.php" class="block py-2 px-3 md:p-0 text-white bg-[#63BF5F] rounded md:bg-transparent md:text-[#63BF5F]" aria-current="page">Top-up</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 md:p-0 text-white rounded hover:bg-[#63BF5F] md:hover:bg-transparent md:hover:text-[#63BF5F]">About</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 md:p-0 text-white rounded hover:bg-[#63BF5F] md:hover:bg-transparent md:hover:text-[#63BF5F]">Services</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 md:p-0 text-white rounded hover:bg-[#63BF5F] md:hover:bg-transparent md:hover:text-[#63BF5F]">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
