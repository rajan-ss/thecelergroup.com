<?php
include 'header.php'; ?>

<?php /*
<!-- Top Categories - starts -->
<section class="container py-12 lg:py-16 xl:py-24">
  <h2 class="text-center mb-4 lg:mb-8 xl:mb-12">Featured Brands</h2>
  <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:grid-rows-2 gap-4 xl:max-h-[618px] max-sm:max-w-[320px] max-sm:mx-auto">
    <div class="xl:row-span-2 xl:col-span-2 border border-solid border-black/10 transition ease-in-out duration-500 hover:border-dark-green-1/30 hover:shadow-[0px_1px_50px_rgba(46,119,80,0.14)] focus:border-dark-green-1/30 focus:shadow-[0px_1px_50px_rgba(46,119,80,0.14)] rounded-md text-center py-8 px-6 lg:py-10 lg:px-12">
      <div class="grid h-full">
        <figure class="mb-4 lg:mb-8">
          <img class="mx-auto xl:w-full" src="<?php echo get_template_directory_uri();?>/assets/images/categories-feature-img01.png" alt="Categories Feature Image" width="413" height="312" loading="lazy">
        </figure>
        <div>
          <h3 class="font-semibold text-xl xl:text-3xl mb-4 lg:mb-5">Fuel Transfer And Management</h3>
          <figure>
            <img class="mx-auto" src="<?php echo get_template_directory_uri();?>/assets/images/piusi-logo.png" alt="PIUSI Logo" width="82" height="41" loading="lazy">
          </figure>
        </div>
      </div>
    </div> <!-- Card -->
    <div class="border border-solid border-black/10 transition ease-in-out duration-500 hover:border-dark-green-1/30 hover:shadow-[0px_1px_50px_rgba(46,119,80,0.14)] focus:border-dark-green-1/30 focus:shadow-[0px_1px_50px_rgba(46,119,80,0.14)] rounded-md text-center py-8 px-6">
      <div class="grid h-full">
        <div class="mb-3">
          <h3 class="font-semibold text-xl mb-4 lg:mb-5">DEF Storage & Transfer</h3>
          <figure>
            <img class="max-w-[67px] mx-auto" src="<?php echo get_template_directory_uri();?>/assets/images/piusi-logo.png" alt="PIUSI Logo" width="82" height="41" loading="lazy">
          </figure>
        </div>
        <figure>
          <img class="mx-auto" src="<?php echo get_template_directory_uri();?>/assets/images/categories-feature-img02.png" alt="Categories Feature Image" width="198" height="139" loading="lazy">
        </figure>
      </div>
    </div> <!-- Card -->
    <div class="border border-solid border-black/10 transition ease-in-out duration-500 hover:border-dark-green-1/30 hover:shadow-[0px_1px_50px_rgba(46,119,80,0.14)] focus:border-dark-green-1/30 focus:shadow-[0px_1px_50px_rgba(46,119,80,0.14)] rounded-md text-center py-8 px-6">
      <div class="grid h-full">
        <div class="mb-3">
          <h3 class="font-semibold text-xl mb-4 lg:mb-5">Bulk Fuel Storage</h3>
          <figure>
            <img class="mx-auto" src="<?php echo get_template_directory_uri();?>/assets/images/unity-fuel-solutions-logo-sm.png" alt="Unity Fuel Solutions Logo" width="65" height="21" loading="lazy">
          </figure>
        </div>
        <figure>
          <img class="mx-auto" src="<?php echo get_template_directory_uri();?>/assets/images/categories-feature-img03.png" alt="Categories Feature Image" width="198" height="139" loading="lazy">
        </figure>
      </div>
    </div> <!-- Card -->
    <div class="border border-solid border-black/10 transition ease-in-out duration-500 hover:border-dark-green-1/30 hover:shadow-[0px_1px_50px_rgba(46,119,80,0.14)] focus:border-dark-green-1/30 focus:shadow-[0px_1px_50px_rgba(46,119,80,0.14)] rounded-md text-center py-8 px-6">
      <div class="grid h-full">
        <div class="mb-3">
          <h3 class="font-semibold text-xl mb-4 lg:mb-5">Fuel Delivery Hose Reels</h3>
          <figure>
            <img class="mx-auto" src="<?php echo get_template_directory_uri();?>/assets/images/hannay-reels-logo-sm.png" alt="Hannay Reels Logo" width="131" height="34" loading="lazy">
          </figure>
        </div>
        <figure>
          <img class="mx-auto" src="<?php echo get_template_directory_uri();?>/assets/images/categories-feature-img04.png" alt="Categories Feature Image" width="198" height="139" loading="lazy">
        </figure>
      </div>
    </div> <!-- Card -->
    <div class="border border-solid border-black/10 transition ease-in-out duration-500 hover:border-dark-green-1/30 hover:shadow-[0px_1px_50px_rgba(46,119,80,0.14)] focus:border-dark-green-1/30 focus:shadow-[0px_1px_50px_rgba(46,119,80,0.14)] rounded-md text-center py-8 px-6">
      <div class="grid h-full">
        <div class="mb-3">
          <h3 class="font-semibold text-xl mb-4 lg:mb-5">Cloud Based Fuel Management</h3>
          <figure>
            <img class="max-w-[67px] mx-auto" src="<?php echo get_template_directory_uri();?>/assets/images/gir-logo-sm.png" alt="GIR Logo" width="72" height="30" loading="lazy">
          </figure>
        </div>
        <figure>
          <img class="mx-auto" src="<?php echo get_template_directory_uri();?>/assets/images/categories-feature-img05.png" alt="Categories Feature Image" width="198" height="139" loading="lazy">
        </figure>
      </div>
    </div> <!-- Card -->
  </div>
</section>
<!-- Top Categories - ends -->

<!-- About - starts -->
<section class="bg-dark-green-1/5 py-12 lg:py-16 xl:py-20">
  <div class="container">
    <div class="grid lg:grid-cols-2 gap-8 lg:gap-16 items-center">
      <figure class="overflow-hidden">
        <img class="lg:w-full rounded-md" src="<?php echo get_template_directory_uri();?>/assets/images/about-feature-img01.jpg" alt="About Us Feature Image" width="616" height="603" loading="lazy">
      </figure>
      <div class="text-base lg:leading-relaxed">
        <span class="font-bold text-base text-dark-blue-1 inline-block mb-4">ABOUT THE CELER GROUP</span>
        <h2 class="lg:leading-snug mb-4">We Strive To Work Hard To Fulfill The Needs</h2>
        <p class="mb-8 lg:mb-12 xl:mb-16">The Celer Group with over a decade of quality design, innovative thinking, and project management excellence of storage and management of liquid fuels.</p>

        <div class="grid md:grid-cols-2 md:gap-8">
          <div class="text-sm lg:leading-relaxed xl:leading-loose">
            <h3 class="text-2xl pl-12 relative before:absolute before:w-10 before:h-px before:bg-black/40 before:left-0 before:top-1/2 before:-translate-y-1/2">What We Do</h3>
            <p>Working with a wide range of industry sectors over many years has given The Celer Group the insight into the necessary storage & management tools to ensure your business remains productive.</p>
          </div>
          <div class="text-sm lg:leading-relaxed xl:leading-loose">
            <h3 class="text-2xl pl-12 relative before:absolute before:w-10 before:h-px before:bg-black/40 before:left-0 before:top-1/2 before:-translate-y-1/2">Our Vision</h3>
            <p>Our vision at The Celer Group is to provide fuel storage & management solutions & products for all industries through service, accountability and accuracy.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- About - ends -->
*/ ?>

<?php
include 'footer.php'; ?>