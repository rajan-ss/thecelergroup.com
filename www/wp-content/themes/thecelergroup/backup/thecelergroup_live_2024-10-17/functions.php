<?php

/**
 * Enqueue scripts and styles.
 */
function tcg_scripts()
{
	wp_enqueue_style('tcg-icomoon', get_template_directory_uri() . '/lib/icomoon/style.css');
	wp_enqueue_style('tcg-slick', get_template_directory_uri() . '/lib/slick/slick.css');
	wp_enqueue_style('tcg-main', get_template_directory_uri() . '/assets/css/style.css');

	wp_enqueue_script('tcg-jquery', get_template_directory_uri() . '/lib/jquery.min.js', array(), null, true);
	wp_enqueue_script('tcg-slick', get_template_directory_uri() . '/lib/slick/slick.min.js', array(), null, true);
	wp_enqueue_script('tcg-main', get_template_directory_uri() . '/assets/js/main.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'tcg_scripts');
