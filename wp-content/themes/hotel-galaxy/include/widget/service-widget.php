<?php 
add_action( 'widgets_init','hotel_galaxy_service_widget_fun'); 
/*
 * hotel galaxy service widget
 */
function hotel_galaxy_service_widget_fun() 
{ 
	return   register_widget( 'hotel_galaxy_service_widget' );
}

class hotel_galaxy_service_widget extends WP_Widget {

	function __construct() {
		$opts = array(
			'classname'   => 'hotel_galaxy_service_widget',
			'description' => __( 'Display services.', 'hotel-galaxy' ),
			);
		parent::__construct( 'hotel-galaxy-services', __( 'Hotel Galaxy: Services', 'hotel-galaxy' ), $opts );
	}

	function widget( $args, $instance ) {

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		$services_ids = array();
		$item_number = 6;

		for ( $i = 1; $i <= $item_number; $i++ ) {
			if ( ! empty( $instance["item_id_$i"] ) && absint( $instance["item_id_$i"] ) > 0 ) {
				$id = absint( $instance["item_id_$i"] );
				$services_ids[ $id ]['id']   = $id;
				$services_ids[ $id ]['icon'] = $instance["item_icon_$i"];
			}
		}

		echo $args['before_widget'];

		echo '<div class="container">';

		if ( $title ) {
			?>
			<div class="row">
				<div class="col-md-12">
					<div class="section-title animate fadeInRight">
						<h1 class="heading head-m feature-title"><?php echo esc_attr($title); ?></h1>
						<div class="pagetitle-separator"></div>
					</div>
				</div>
			</div>
			<?php
		}

		if ( ! empty( $services_ids ) ) {
			$query_args = array(
				'posts_per_page' => count( $services_ids ),
				'post__in'       => wp_list_pluck( $services_ids, 'id' ),
				'orderby'        => 'post__in',
				'post_type'      => 'page',
				'no_found_rows'  => true,
				);
				$all_services = get_posts( $query_args ); ?>

				<?php if ( ! empty( $all_services ) ) : ?>
				<?php global $post; ?>
				<div class="row">
					

					<?php foreach ( $all_services as $post ) : ?>
					<?php setup_postdata( $post ); ?>
					<div class="col-md-4 col-sm-6 animate zoomIn" data-anim-type="zoomIn" data-anim-delay="200">
						<div class="feature-col">
							<a class="sr-icon" href="<?php the_permalink(); ?>"><i class="fa <?php echo esc_attr( $services_ids[ $post->ID ]['icon'] ); ?>"></i></a>
							<h3>
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h3>
							<?php $content = hotel_galaxy_get_the_excerpt( 25, $post );
							echo wp_kses_post($content) ? wpautop( wp_kses_post($content) ) : '';

							?>
							<hr>
							
							<div class="text-center"><a href="<?php the_permalink(); ?>" class="custom-btn book-sm"><i class="fa fa-chevron-circle-right"></i><?php _e('Read More','hotel-galaxy'); ?></a>
							</div>
						
						
					</div>
				</div><!-- .services-item -->
			<?php endforeach; ?>


		</div><!-- .services-list -->

		<?php wp_reset_postdata(); ?>

		<?php endif;
	}

	echo '</div>';

	echo $args['after_widget'];

}

function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	$instance['title'] = sanitize_text_field( $new_instance['title'] );

	$item_number = 8;

	for ( $i = 1; $i <= $item_number; $i++ ) {
		$instance["item_id_$i"]   = absint( $new_instance["item_id_$i"] );
		$instance["item_icon_$i"] = esc_attr( $new_instance["item_icon_$i"] );
	}

	return $instance;
}

function form( $instance ) {

			// Defaults.
	$defaults = array(
		'title' => '',
		);

	$item_number = 8;

	for ( $i = 1; $i <= $item_number; $i++ ) {
		$defaults["item_id_$i"]   = '';
		$defaults["item_icon_$i"] = 'fa-cog';
	}

	$instance = wp_parse_args( (array) $instance, $defaults );
	?>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php _e( 'Title:', 'hotel-galaxy' ); ?></strong></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
	</p>
	<?php
	for ( $i = 1; $i <= $item_number; $i++ ) {
		?>
		<p>
			<label for="<?php echo $this->get_field_id( "item_id_$i" ); ?>"><strong><?php _e( 'Page:', 'hotel-galaxy' ); ?>&nbsp;<?php echo $i; ?></strong></label>
			<?php
			wp_dropdown_pages( array(
				'id'               => $this->get_field_id( "item_id_$i" ),
				'class'            => 'widefat',
				'name'             => $this->get_field_name( "item_id_$i" ),
				'selected'         => $instance["item_id_$i"],
				'show_option_none' => esc_html__( '&mdash; Select &mdash;', 'hotel-galaxy' ),
				)
			);
			?>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( "item_icon_$i" ) ); ?>"><strong><?php _e( 'Icon:', 'hotel-galaxy' ); ?>&nbsp;<?php echo $i; ?></strong></label>
			<input  id="<?php echo esc_attr( $this->get_field_id( "item_icon_$i" ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( "item_icon_$i" ) ); ?>" type="text" value="<?php echo esc_attr( $instance["item_icon_$i"] ); ?>" />
		</p>
		<?php
	}
}
}