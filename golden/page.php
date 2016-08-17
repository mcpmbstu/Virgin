<?php
/**
 *
 * Template Name: Page (Full Width)
 * Description: Template for general pages, with no sidebar.
 *
 */

get_header(); ?>

	<div id="main">
			
		<section id="page-feature-image">
		
			<div class="row">
				
				<?php //the_post_thumbnail('page-feature-image');
				the_post_thumbnail('full');
				?>
				
				<div class="feature-caption">
					<h1 class="feature-title"><span><?php echo get_post_meta($post->ID, 'gt_page_strapline', true) ?></span></h1>
				</div>
		
			</div><!-- end .row -->
		
		</section><!-- end #page-feature-image -->
		
		<div class="container">
		
			<section id="content" class="row">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
				<div class="sixteen columns">
					
					<?php the_content(); ?>
				
				</div><!-- end .sixteen columns -->
				
			<?php endwhile; endif; ?>
		
			</section><!-- end #content -->
		
		</div><!-- end .container -->
			
	</div><!-- end #main -->
		
<?php get_footer(); ?>