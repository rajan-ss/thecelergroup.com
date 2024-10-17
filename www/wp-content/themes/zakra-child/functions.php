<?php 

require_once('inc/custom_function.php');
	 add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
	 function my_theme_enqueue_styles() { 
 		  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
 		  } 


add_action('wp_head','add_to_cart_script');
function add_to_cart_script(){
  if(is_product()){
    wp_enqueue_script('wc-add-to-cart-variation');
  }
}