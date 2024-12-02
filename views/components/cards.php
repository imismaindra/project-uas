<?php foreach ($categories as $category): ?>
<a href="index.php?slug=<?php echo $category['slug']?>" 
   class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-md 
   hover:bg-gray-100 transition-all duration-300 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="object-cover w-full rounded-t-lg h-40 md:h-[7rem] md:w-[6rem] md:rounded-none md:rounded-s-lg" 
         src="<?= $category['image'] ?>" alt="<?= $category['name'] ?>">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
            <?php echo $category['name'] ?>
        </h5>
        <p class="mb-3 text-sm font-normal text-gray-700 dark:text-gray-400">
            <?php echo $category['description'] ?>
        </p>
    </div>
</a>

<?php endforeach; ?>
