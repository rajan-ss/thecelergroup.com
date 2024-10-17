<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1" />
  <title>Landing Page - The Celer Group, LLC</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <div class="site-wrapper">

    <!-- Header - starts -->
    <header class="site-header js-bg-cover bg-cover bg-center bg-no-repeat relative z-[1] before:absolute before:inset-0 before:bg-dark-grey-4/80 before:-z-[1]">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/the-celer-group-hero-bg.jpg" alt="The Celer Group Hero Background Image" width="1440" height="750" loading="lazy">
      <div class="container">
        <div class="flex items-center justify-between py-4 lg:py-6 relative before:absolute before:bottom-0 before:h-px before:bg-white/50 before:-left-[999px] before:-right-[999px]">
          <a href="https://www.thecelergroup.com/" class="block mr-4">
            <img class="max-lg:max-w-[142px] max-sm:max-w-[124px]" src="<?php echo get_template_directory_uri(); ?>/assets/images/the-celer-group-logo.svg" alt="The Celer Group Logo" width="250" height="124" loading="lazy">
          </a>

          <ul class="inline-grid grid-flow-col gap-2 md:gap-4 lg:gap-6 xl:gap-12">
            <li><a href="tel:8607161543" class="text-sm text-white flex items-center max-md:text-[0]"><i class="icon-phone w-8 h-8 rounded-full bg-white/20 inline-flex items-center justify-center text-xs text-white mr-2"></i> 860-716-1543</a></li>
            <li><a href="mailto:info@thecelergroup.com" class="text-sm text-white flex items-center max-md:text-[0]"><i class="icon-mail w-8 h-8 rounded-full bg-white/20 inline-flex items-center justify-center text-xs text-white mr-2"></i> info@thecelergroup.com</a></li>
          </ul>
        </div>

        <div class="text-center max-w-5xl mx-auto py-16 lg:py-24 xl:py-32 2xl:py-44">
          <span class="inline-block bg-primary/10 border border-solid border-primary/40 rounded-md text-base text-white py-2 px-6 mb-4">NEW WEBSITE COMING SOON</span>
          <h1 class="text-white mb-4 lg:mb-6 xl:mb-9 !leading-snug">THE CÉLER GROUP</h1>
          <p>The Celer Group is a global supplier of turnkey fuel storage and energy systems that provide increased operational efficiency, energy cost savings, and innovative solutions tailored to meet the diverse needs of various industries.</p>
          <!-- <a href="#form" class="js-has-smooth btn btn-outline">Request A Quote</a> -->
        </div>
      </div>
    </header>
    <!-- Header - ends -->

    <main class="site-content">