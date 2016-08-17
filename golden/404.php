<?php
/**
 *
 * Description: Template for the 404 (Error/Not Found) page.
 *
 */
get_header(); ?>

	<div id="main">
		
		<div class="container">
		
			<section id="content" class="row">

				<div id="page-not-found" class="sixteen columns">
					
					<i class="icon-warning-sign"></i>
					
					<h2 class="post-title"><?php _e('<span>Woops! It seems a page is missing.</span><br /> This is pretty darn embarrasing.', 'golden'); ?></h2>
					<p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Please try using one of the navigation links above.', 'golden'); ?></p>
					<a class="read-more-btn" href="<?php echo home_url(); ?>">&larr; <?php _e('Go to the Homepage', 'golden'); ?></a>
				
				</div><!-- end #page-not-found --> 
		
			</section><!-- end #content -->
		
		</div><!-- end .container -->
			
	</div><!-- end #main -->
		
<?php get_footer(); ?>