<div class="mb-4 grid grid-cols-3 gap-4 sm:mb-8 sm:grid-cols-4 sm:gap-x-6 sm:gap-y-8 lg:grid-cols-5 xl:grid-cols-6">
    <?php foreach ($categoriesCard as $category): ?>    
        <a tabindex="0" href="index.php?slug=<?php echo $category['slug']?>" 
            style="outline: none; opacity: 1; transform: none;">
            <div 
                class="group relative transform overflow-hidden rounded-2xl bg-gray-200 duration-300 
                ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-[#3FC43B] hover:ring-offset-2 hover:ring-offset-gray-100 
                w-[193px] h-[267px]">
                <img 
                    alt="<?= $category['name'] ?>"  
                    src="<?= $category['image'] ?>" 
                    class="w-full h-full object-cover object-center" 
                />
                <article 
                    class="absolute inset-x-0 -bottom-10 z-10 flex transform flex-col px-3 transition-all duration-300 ease-in-out group-hover:bottom-3 sm:px-4 group-hover:sm:bottom-4">
                    <h2 class="truncate text-sm font-semibold text-gray-900 sm:text-base">
                        <?= $category['name'] ?>
                    </h2>
                    <p class="truncate text-xs text-gray-700 sm:text-sm">
                        <?= $category['description'] ?>
                    </p>
                </article>
                <div class="absolute inset-0 transform bg-gradient-to-t from-transparent transition-all duration-300 group-hover:from-[#3FC43B]"></div>
            </div>
        </a>
    <?php endforeach; ?>
</div>
