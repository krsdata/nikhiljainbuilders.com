<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package 99colorthemes
 * @subpackage PageLine
 * @since PageLine 1.0
 */
?>

<?php get_header(); ?>	
	<?php do_action( 'pageline_before_body_content' );
	$pageline_layout = pageline_layout_class(); ?>
	<div id="content" class="site-content">
	   <main id="main" class="clearfix <?php echo esc_attr( $pageline_layout ); ?>">
		   	<div class="nnc-container">
		   		<!-- Breadcrumbs -->
				<div class="block">
					<?php pageline_breadcrumbs(); ?>					
				</div>
			   	<div id="primary">					
					<?php while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', 'page' );
						do_action( 'pageline_before_comments_template' );						
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
		      			do_action ( 'pageline_after_comments_template' );
					endwhile; ?>	
				</div><!-- #primary -->
				<?php  pageline_sidebar_select(); ?>
		   	</div><!-- .nnc-container -->
		</main><!-- #main -->
	</div><!-- #content -->
	<?php do_action( 'pageline_after_body_content' ); ?>
<?php get_footer(); ?>