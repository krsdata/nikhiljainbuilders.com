<?php
/**
 * Hook functions of theme.
 *
 * This is the file to include hooks used in theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Business_Era
 */

//=============================================================
// Before content hook of the theme
//=============================================================
if ( ! function_exists( 'business_era_before_content_action' ) ) :
    
    function business_era_before_content_action() {

    	?><div id="content" class="site-content"><div class="container"><div class="inner-wrapper"><?php
    	
    }

endif;

add_action( 'business_era_before_content', 'business_era_before_content_action' );


//=============================================================
// After content hook of the theme
//=============================================================
if ( ! function_exists( 'business_era_after_content_action' ) ) :
    
    function business_era_after_content_action() { 

    	?></div><!-- .inner-wrapper --></div><!-- .container --></div><!-- #content --><?php 

    }

endif;

add_action( 'business_era_after_content', 'business_era_after_content_action' );

//=============================================================
// Credit info hook of the theme
//=============================================================
if ( ! function_exists( 'business_era_credit_info' ) ) :

    function business_era_credit_info(){ ?> 

	    <div class="site-info">
	    	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'business-era' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'business-era' ), 'WordPress' ); ?></a>
	    	<span class="sep"> | </span>
	    	<?php printf( esc_html__( 'Theme: %1$s', 'business-era' ), '<a href="https://wordpress.org/themes/business-era/" >Business Era</a>' ); ?>
	    </div><!-- .site-info -->
        
    	<?php
	}

endif;

add_action( 'business_era_credit', 'business_era_credit_info', 10 );