<?php
add_action( 'customize_register', 'hotel_galaxy_customizer' );
function hotel_galaxy_customizer( $wp_customize ) {	
	/* Genral section */	
	$wp_customize->add_panel( 'hotel_galaxy_theme_option', array(
		'title' => __( 'Hotel Galaxy Settings','hotel-galaxy' ),
    'priority' => 1, // Mixed with top-level-section hierarchy.
    ) );

	$hotel_galaxy_option=hotel_galaxy_default_setting();	

	/**genral option  start**/
	require_once(Hotel_galaxy_Dir_Uri_include . '/customizer/genral-option.php');
	/**genral option  end**/

	/**slider option  start**/
	require_once(Hotel_galaxy_Dir_Uri_include . '/customizer/slider.php');
	/**slider option  end**/

	/**page-title  start**/
	require_once(Hotel_galaxy_Dir_Uri_include . '/customizer/page-title-section.php');
	/**page-title  end**/

	/**social link  start**/
	require_once(Hotel_galaxy_Dir_Uri_include . '/customizer/social-links.php');
	/**social link  end**/


	/**footer collout start**/
	require_once(Hotel_galaxy_Dir_Uri_include . '/customizer/footer-collout.php');
	/**footer collout end**/

	/**footer start**/
	require_once(Hotel_galaxy_Dir_Uri_include . '/customizer/footer-section.php');
	/**footer end**/

	
}

function hotel_galaxy_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function hotel_galaxy_sanitize_integer( $input ) {
	if( is_numeric( $input ) ) {
		return intval( $input );
	}
}

if ( ! function_exists( 'hotel_galaxy_sanitize_select' ) ) :

	/**
	 * Sanitize select.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed                $input The value to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return mixed Sanitized value.
	 */
	function hotel_galaxy_sanitize_select( $input, $setting ) {

		// Ensure input is clean.
		$input = esc_attr( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}

endif;

if ( ! function_exists( 'hotel_galaxy_sanitize_dropdown_pages' ) ) :

	/**
	 * Sanitize dropdown pages.
	 *
	 * @since 1.0.0
	 *
	 * @param int                  $page_id Page ID.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return int|string Page ID if the page is published; otherwise, the setting default.
	 */
	function hotel_galaxy_sanitize_dropdown_pages( $page_id, $setting ) {

		// Ensure $input is an absolute integer.
		$page_id = absint( $page_id );

		// If $page_id is an ID of a published page, return it; otherwise, return the default.
		return ( 'publish' === get_post_status( $page_id ) ? $page_id : $setting->default );

	}

endif;


if ( ! class_exists( 'WP_Customize_Control' ) )
	return NULL;

/**
* 
*/
class hotel_galaxy_setting_separate extends WP_Customize_Control
{	
	function render_content()
	{
		switch ( $this->type ) {
			default:
			case 'hr_tag' :
			echo '<h3 style="text-align:center; color:#dbb26b;">' . esc_html( $this->label ) . '</h3><hr />';
			break;
		}
	}
}

if ( ! function_exists( 'hotel_galaxy_is_featured_slider_active' ) ) :

	/**
	 * Check if featured slider is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function hotel_galaxy_is_featured_slider_active( $control ) {

		
		if ( 'disable' !== $control->manager->get_setting( 'slider_status' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;
?>