<?php 
/****read more text empty*****/


/****read more text set*****/
function hotel_galaxy_excerpt_morebtn( $more ) {
	$morebtn='';
	if(!is_single()){
		$morebtn= '<div class="" ><a class="custom-btn book-sm" href="' . esc_url(get_permalink( get_the_ID() )) . '"><i class="fa fa-chevron-circle-right"></i>' . __( 'Read More', 'hotel-galaxy' ) . '</a></div>';
	}
	return $morebtn; 
}	
add_filter( 'excerpt_more', 'hotel_galaxy_excerpt_morebtn' );


function hotel_galaxy_news_excerpt( $new_length = 20, $new_more = 'Read More') {
	add_filter('excerpt_length', function () use ($new_length) {
		return $new_length;
	}, 999 );
	
	add_filter('excerpt_more', function () use ($new_more) {
		return $new_more;
	});
	
	$output = get_the_excerpt();
	$output = apply_filters('wptexturize', $output);
	$output = apply_filters('convert_chars', $output);
	$output = esc_html('<p>') . esc_attr($output) . esc_html('</p>');
	echo esc_attr($output);
}
?>