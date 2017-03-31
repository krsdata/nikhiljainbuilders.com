<?php if ( post_password_required() ) : ?>
	<p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'hotel-galaxy' ); ?></p>
	<?php return;
	endif; ?>
	<!-----Comment section------------------>	   
	<div class="comment-section">
		<?php if(have_comments()):	?>
		<h2><?php echo comments_number(__('No Comments','hotel-galaxy'), __('1 Comment','hotel-galaxy'), '% Comments'); ?></h2>
	<?php	endif; ?>		
	<?php wp_list_comments( array( 'callback' => 'hotel_galaxy_comment' ) ); ?>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below">
		<h1 class="assistive-text">
			<?php _e( 'Comment navigation', 'hotel-galaxy' ); ?>
		</h1>
		<div class="nav-previous">
			<?php previous_comments_link( __( '&larr; Older Comments', 'hotel-galaxy' ) ); ?>
		</div>
		<div class="nav-next">
			<?php next_comments_link( __( 'Newer Comments &rarr;', 'hotel-galaxy' ) ); ?>
		</div>
	</nav>
<?php endif;  ?>		
</div>
<!-------Comment Form Section---------->
<?php if ( comments_open() ) : ?>
	<div class="comment-form">
		<?php  
		$fields=array(
			'author' => '<div class="row"><div class="col-md-6"><input type="text" name="author" class="form-control" id="author" placeholder="Complete Name *">
			</div>',
			'email' => '<div class="col-md-6"><input type="text" name="email" class="form-control" id="email"  placeholder="Email Address *">
			</div></div>',			
			);
		function hotel_galaxy_my_fields($fields) { 
			return $fields;
		}
		add_filter('wl_comment_form_default_fields','hotel_galaxy_my_fields');

		$defaults = array(
			'fields'=> apply_filters( 'hotel_galaxy_comment_form', $fields ),
			'comment_field'=> '<textarea id="comment" name="comment" placeholder="Enter Your Message" rows="6"></textarea>',
			'class_form'      => 'form-inline',		
			'logged_in_as' => '<p class="logged-in-as">' . __( "Logged in as ",'hotel-galaxy' ).'<a href="'. admin_url( 'profile.php' ).'">'.$user_identity.'</a>'. '<a href="'.esc_url(wp_logout_url( get_permalink() )) .'" title="'.esc_attr('Log out of this account').'">'.__(" Log out?",'hotel-galaxy').'</a>' . '</p>',
			'title_reply_to' => __( 'Leave a Reply to %s','hotel-galaxy'),
			'class_submit' => 'custom-btn book-lg',
			'label_submit'=>__( 'Submit Now','hotel-galaxy'),
			'comment_notes_before'=> '',
			'comment_notes_after'=>'',
			'title_reply'=> '<h2>'.__('Leave a Reply','hotel-galaxy').'</h2><p>Your email address will not be published. Required fields are marked *</p>',		
			'role_form'=> 'form',		
			);
		comment_form($defaults);

		?>		
	</div>
	<?php endif;  ?>