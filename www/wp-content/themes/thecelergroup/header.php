<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1" />
  <title>Landing Page - The Celer Group, LLC</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <div class="site-wrapper">

    <!-- Header - starts -->
    <header class="site-header">
      <div class="bg-white">
        <div class="container flex items-center justify-between py-4 lg:py-6 bg-white">
          <a href="https://www.thecelergroup.com/" class="block mr-4">
            <img class="max-lg:max-w-[142px] max-sm:max-w-[124px]" src="<?php echo get_template_directory_uri(); ?>/assets/images/the-celer-group-logo.svg" alt="The Celer Group Logo" width="250" height="124" loading="lazy">
          </a>

          <ul class="inline-grid grid-flow-col gap-2 md:gap-4 lg:gap-6 xl:gap-12">

            <li><a href="mailto:info@thecelergroup.com" class="text-sm flex items-center gap-3 max-md:text-[0] text-center font-semibold from-dark-blue-2 to-dark-green-2 bg-gradient-to-r bg-clip-text text-transparent group">
                <span class="w-11 h-11 rounded-full bg-white border-[1.5px] border-dark-green-2 flex justify-center items-center text-center font-semibold from-dark-blue-2 to-dark-green-2 bg-gradient-to-b bg-clip-text text-transparent"><i class="icon-mail w-9 h-9 rounded-full bg-dark-green-2/20 inline-flex items-center justify-center text-lg ring-1 ring-dark-green-2 group-hover:ring-0 transition-all"></i> </span>info@thecelergroup.com
              </a>
            </li>

            <li><a href="tel:8607161543" class="text-sm flex items-center gap-3 max-md:text-[0] text-center font-semibold from-dark-blue-2 to-dark-green-2 bg-gradient-to-r bg-clip-text text-transparent group">
                <span class="w-11 h-11 rounded-full bg-white border-[1.5px] border-dark-green-2 flex justify-center items-center text-center font-semibold from-dark-blue-2 to-dark-green-2 bg-gradient-to-b bg-clip-text text-transparent"><i class="icon-phone w-9 h-9 rounded-full bg-dark-green-2/20 inline-flex items-center justify-center text-lg ring-1 ring-dark-green-2 group-hover:ring-0 transition-all"></i> </span>860-716-1543
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="rotate-gradient bg-dark-blue-2">
        <div class="relative z-10 container">
          <div class="max-w-lg py-16 lg:py-24 xl:py-32 2xl:py-44 flex flex-col gap-5">
            <span class="bg-gradient-to-r from-dark-green-2 to-dark-blue-2 py-1 px-3 text-white max-w-[150px] lg:max-w-[196px]">NEW WEBSITE</span>
            <span class="font-base text-4xl md:text-5xl lg:text-6xl font-400 text-white uppercase border-b border-dark-green-2 pb-3 max-w-[420px]">COMING SOON</span>
            <h1 class="mb-0 !leading-snug">THE CÉLER GROUP</h1>
            <div class="[&_p]:mb-0 [&_p]:text-white [&_p]:pl-4 [&_p]:border-l-2 [&_p]:border-white [&_p]:font-semibold">
              <p>The Celer Group is a global supplier of turnkey fuel storage and energy systems that provide increased operational efficiency, energy cost savings, and innovative solutions tailored to meet the diverse needs of various industries.</p>
            </div>
            <!-- <a href=" #form" class="js-has-smooth btn btn-outline">Request A Quote</a> -->
          </div>
        </div>
      </div>

    </header>
    <!-- Header - ends -->

    <main class="site-content">