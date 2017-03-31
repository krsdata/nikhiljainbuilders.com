<?php
/**
 * Core functions.
 *
 * @package Business_Era
 */

if ( ! function_exists( 'business_era_get_option' ) ) :

	/**
	 * Get theme option.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function business_era_get_option( $key ) {

		if ( empty( $key ) ) {
			return;
		}

		$value = '';

		$default = business_era_get_default_theme_options();
		$default_value = null;
		if ( is_array( $default ) && isset( $default[ $key ] ) ) {
			$default_value = $default[ $key ];
		}

		if ( null !== $default_value ) {
			$value = get_theme_mod( $key, $default_value );
		}
		else {
			$value = get_theme_mod( $key );
		}

		return $value;

	}
endif;

if ( ! function_exists( 'business_era_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function business_era_get_default_theme_options() {

		$defaults = array();

		// Header.
		$defaults['show_title']   = true;
		$defaults['show_tagline'] = true;

		// homepage.
		$defaults['show_home_content'] = true;

		// Layout.
		$defaults['global_layout']  = 'right-sidebar';
		$defaults['archive_layout'] = 'excerpt';

		// Footer.
		$defaults['copyright_text'] = esc_html__( 'Copyright &copy; All rights reserved.', 'business-era' );

		// Blog.
		$defaults['excerpt_length'] 		= 40;
		$defaults['read_more_text'] 		= esc_html__( 'Read more', 'business-era' );
		$defaults['blog_featured_image']   	= true;

		// Breadcrumb.
		$defaults['breadcrumb_type'] = 'simple';

		// Slider.
		$defaults['slider_status']            = 'disable';
		$defaults['slider_transition_effect'] = 'fadeout';
		$defaults['slider_transition_delay']  = 3;
		$defaults['slider_caption_status']    = true;
		$defaults['slider_arrow_status']      = true;
		$defaults['slider_pager_status']      = true;
		$defaults['slider_autoplay_status']   = true;
		$defaults['page_featured_image']   	  = false;
		

		$defaults['show_top_header']   		  = true;
		$defaults['show_social_link']         = '';
		$defaults['address']   				  = '';
		$defaults['telephone']   		      = '';
		$defaults['email']   				  = '';
		$defaults['opening_hours']   		  = '';

		return $defaults;
	}
endif;
