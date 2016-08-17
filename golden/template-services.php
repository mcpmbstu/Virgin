<?php
/**
 *
 * Template Name: Services
 * Description: Page template to display the services page.
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
		
		<section id="our-services">
				
			<div class="container">
				
				<div class="row">
				
					<?php
					global $data;
					
					$args = array('post_type' => 'services', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => -1);
					$loop = new WP_Query($args);
					while ($loop->have_posts()) : $loop->the_post(); ?>
				
					<div class="service one-third column">

						<?php echo do_shortcode(get_post_meta($post->ID, 'gt_service_icon', $single = true)) ?>

						<h2><?php the_title(); ?></h2>
						
						<?php the_content(); ?>
						
						<a class="read-more-btn" href="<?php echo get_post_meta($post->ID, 'gt_service_url', true) ?>"><?php echo get_post_meta($post->ID, 'gt_service_button_title', true) ?> &rarr;</a>
					
					</div><!-- end .service -->
					
					<?php endwhile; ?>
											
				</div><!-- end .row -->
		
			</div><!-- end .container -->
		
		</section><!-- end #our-services -->
			
	</div><!-- end #main -->
	
<?php get_footer(); ?>