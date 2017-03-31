<?php 
if ( ! ( is_front_page() && ! is_home() ) ) {
	return;
}
 ?>

<section class="feature-section animate fadeInUp" data-anim-type="fadeInUp" data-anim-delay="800" >
	<div class="container">
		
		<div class="row">
			<?php if ( is_active_sidebar( 'home-services' ) ) : ?>

			<?php dynamic_sidebar( 'home-services' ); ?>

		<?php endif; ?>
	</div>
</div>
</section>