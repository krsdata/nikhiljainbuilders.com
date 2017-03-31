<?php 
function hotel_galaxy_cssfile(){
	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	wp_enqueue_style('hotel-galaxy-style', Hotel_galaxy_Template_Dir_Uri.'/style.css');	
	wp_enqueue_style('hotel-galaxy-bootstrap-css', Hotel_galaxy_Template_Dir_Uri.'/css/bootstrap.css');	
	wp_enqueue_style('hotel-galaxy-media-responsive-css', Hotel_galaxy_Template_Dir_Uri.'/css/media-responsive.css');
	wp_enqueue_style('hotel-galaxy-animations-min-css', Hotel_galaxy_Template_Dir_Uri.'/css/animations.min.css');
	wp_enqueue_style('hotel-galaxy-fonts-css', Hotel_galaxy_Template_Dir_Uri.'/css/fonts/fonts.css');  
	wp_enqueue_style('hotel-galaxy-font-awesome-min-css', Hotel_galaxy_Template_Dir_Uri.'/css/font-awesome-4.5.0/css/font-awesome.min.css');
	wp_enqueue_style( 'hotel-galaxy-fonts', hotel_galaxy_fonts_url(), array(), null );
}

function hotel_galaxy_jsfile()
{
	wp_enqueue_script('jquery');
	wp_enqueue_script('Hotel_galaxy-bootstrap-js',Hotel_galaxy_Template_Dir_Uri .'/js/bootstrap.js');
	wp_enqueue_script('Hotel_galaxy-custom.js',Hotel_galaxy_Template_Dir_Uri .'/js/custom.js');
	wp_enqueue_script('Hotel_galaxy-animations.min.js',Hotel_galaxy_Template_Dir_Uri .'/js/animations.min.js');
	
}
add_action('wp_enqueue_scripts', 'hotel_galaxy_cssfile'); 
add_action('wp_enqueue_scripts', 'hotel_galaxy_jsfile');
?>