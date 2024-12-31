<div class="max-w-[80rem] mx-auto my-5">
    <div id="default-carousel" class="relative rounded-lg overflow-hidden shadow-lg">
        <!-- Carousel wrapper -->
        <div class="relative h-80 md:h-96 overflow-hidden">
            <!-- Item 1 -->
            <div class="absolute inset-0 opacity-0 transition-opacity duration-700 ease-in-out" data-carousel-item>
                <img src="https://i.ibb.co/FWTR0zh/jujutsu-kaisen-mobile-legends-wallpaper-hd-1.jpg"
                    class="object-cover w-full h-full" alt="Slide 1">
                <span class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-xl font-semibold text-white md:text-2xl">First Slide</span>
            </div>
            <!-- Item 2 -->
            <div class="absolute inset-0 opacity-0 transition-opacity duration-700 ease-in-out" data-carousel-item>
                <img src="https://i.ibb.co/6wGC3GV/hok-pc.jpg"
                    class="object-cover w-full h-full" alt="Slide 2">
            </div>
            <!-- Item 3 -->
            <div class="absolute inset-0 opacity-0 transition-opacity duration-700 ease-in-out" data-carousel-item>
                <img src="https://i.ibb.co/TBmgpMG/wallpaperflare-com-wallpaper-1.jpg"
                    class="object-cover w-full h-full" alt="Slide 3">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="flex absolute bottom-5 left-1/2 z-30 -translate-x-1/2 space-x-2" data-carousel-indicators>
            <button type="button" class="w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition"></button>
            <button type="button" class="w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition"></button>
            <button type="button" class="w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition"></button>
        </div>
        <!-- Slider controls -->
        <button type="button"
            class="flex absolute top-1/2 left-3 z-40 items-center justify-center w-10 h-10 bg-gray-200/50 rounded-full hover:bg-gray-300 focus:outline-none transition"
            data-carousel-prev>
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button type="button"
            class="flex absolute top-1/2 right-3 z-40 items-center justify-center w-10 h-10 bg-gray-200/50 rounded-full hover:bg-gray-300 focus:outline-none transition"
            data-carousel-next>
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const carouselItems = document.querySelectorAll('[data-carousel-item]');
        const indicators = document.querySelectorAll('[data-carousel-indicators] button');
        let currentIndex = 0;

        function showSlide(index) {
            carouselItems.forEach((item, i) => {
                if (i === index) {
                    item.classList.remove('opacity-0');
                    item.classList.add('opacity-100');
                } else {
                    item.classList.remove('opacity-100');
                    item.classList.add('opacity-0');
                }
                indicators[i].classList.toggle('bg-gray-400', i === index);
                indicators[i].classList.toggle('bg-gray-300', i !== index);
            });
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % carouselItems.length;
            showSlide(currentIndex);
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + carouselItems.length) % carouselItems.length;
            showSlide(currentIndex);
        }

        document.querySelector('[data-carousel-next]').addEventListener('click', nextSlide);
        document.querySelector('[data-carousel-prev]').addEventListener('click', prevSlide);

        // Otomatis berpindah setiap 3 detik
        setInterval(nextSlide, 3000);

        // Tampilkan slide pertama saat halaman dimuat
        showSlide(currentIndex);
    });
</script>
