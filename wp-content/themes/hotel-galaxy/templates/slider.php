<?php 

$slider_details = hotel_galaxy_get_slider_details();

if ( empty( $slider_details ) ) {
	return;
}

// Slider status.
$slider_status = hotel_galaxy_get_option('slider_status');

if ( 'disable' === $slider_status ) {
	return;
}
if ( ! ( is_front_page() && ! is_home() ) ) {
	return;
}

?>
<!--Main slider-->
<section class="main-carousel" role="slider" style="padding:0;">
	<div id="main-slider" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner" role="listbox">
			<?php
			$cont=1;
			foreach( $slider_details as $slide){
				
				?>
				<div class="item <?php echo ($cont==1)? __('active','hotel-galaxy') :''; ?>">					
					<img src="<?php echo esc_url( $slide['image_url'] ); ?>" alt="<?php echo esc_attr( $slide['title'] ); ?>">
					<div class="carousel-caption intro-caption">
						<h1 class="slider-title animate zoomIn" data-anim-type="zoomIn" data-anim-delay="200"><?php echo esc_attr( $slide['title'] ); ?></h1>
												
						<p class="animate zoomIn" data-anim-type="zoomIn" data-anim-delay="400"><?php echo esc_attr( $slide['excerpt'] ); ?></p>
						<a target="" href="<?php echo esc_url( $slide['url'] ); ?>" class="custom-btn book-lg animate fadeInUp"><?php _e('Book Now','hotel-galaxy'); ?></a> 
					</div>
				</div>


				<?php
				$cont++;
			}

			?>

		</div> 
		<!-- Pagination --> 
		<ul class="carousel-navigation">
			<li><a class="carousel-prev" href="#main-slider" data-slide="prev"></a></li>
			<li><a class="carousel-next" href="#main-slider" data-slide="next"></a></li>
		</ul> 
		<!-- /Pagination -->
	</div>
</section> 
<!--/Main slider-->
<div class="clearfix"></div>