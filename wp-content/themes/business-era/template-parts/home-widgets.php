<?php
/**
 * Home widgets
 *
 * @package Business_Era
 */

// Bail if not home page.
if ( ! is_front_page() || 'posts' === get_option( 'show_on_front' ) ) {
	return;
}
?>

<div id="home-page-widget-area" class="widget-area">
	<div class="container-wrapper">
		<?php if ( is_active_sidebar( 'home-page-widget-area' ) ) : ?>

			<?php dynamic_sidebar( 'home-page-widget-area' ); ?>
			
		<?php elseif( current_user_can( 'edit_theme_options' ) ): ?>
			<?php
			// CTA.
			$args = array(
				'title'       => __( 'This is Business Era', 'business-era' ),
				'filter'      => true,
				'button_url'  => '#',
				'button_text' => __( 'Learn More', 'business-era' ),
				'text'        => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos dolor possimus inventore ut sint et, blanditiis nobis tempore voluptatum, autem in. Provident fugiat sunt placeat quibusdam dolore, quasi repudiandae eius.', 'business-era' ),
			);
			if ( current_user_can( 'edit_theme_options' ) ) {
				$args['button_url']  = esc_url( admin_url( 'widgets.php' ) );
				$args['button_text'] = __( 'Add Widgets', 'business-era' );
				$args['text']        = __( 'Widgets of Home Page Widget Area will be displayed here. Go to Appearance->Widgets in admin panel to add widgets. All these widgets will be replaced when you start adding widgets.', 'business-era' );
			}

			$widget_args = array(
				'before_title' => '<h2 class="widget-title">',
				'after_title'  => '</h2>',
			);
			the_widget( 'Business_Era_CTA_Widget', $args, $widget_args );
			
			else: ?>
				<div class="container">
					<div class="no-widget-content">
						<p><?php esc_html_e( 'Widgets of Home Page Widget Area will be displayed here. Go to Appearance->Widgets in admin panel to add widgets.', 'business-era' ); ?></p>
					</div>
				</div>
			
		<?php endif; ?>
	</div><!-- .container -->
</div><!-- #home-page-widget-area -->

