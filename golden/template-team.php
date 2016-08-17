<?php
/**
 *
 * Template Name: Team
 * Description: Page template to display the team/staff page.
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
		
		<section id="meet-the-team">
						
			<div class="container">
				
				<div class="row">
				
					<?php
					global $data;
					
					$args = array('post_type' => 'team', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => -1);
					$loop = new WP_Query($args);
					while ($loop->have_posts()) : $loop->the_post(); ?>
				
					<div class="team-member one-third column">
					
						<div class="thumbnail">
							<?php the_post_thumbnail('team-member-thumb'); ?>
						</div>
						
						<i class="icon-star"></i>
						<h2><?php the_title(); ?></h2>
						
						<p><em><?php echo get_post_meta($post->ID, 'gt_member_title', true) ?></em></p>
						
						<?php the_content(); ?>
						
						<div class="social-icons-small">
						<?php if (get_post_meta($post->ID, 'gt_member_twitter', true)) { ?>
							<a href="<?php echo get_post_meta($post->ID, 'gt_member_twitter', true) ?>"><i class="icon-twitter icon-large"></i></a>
						<?php } if (get_post_meta($post->ID, 'gt_member_facebook', true)) { ?>
							<a href="<?php echo get_post_meta($post->ID, 'gt_member_facebook', true) ?>"><i class="icon-facebook icon-large"></i></a>
						<?php } if (get_post_meta($post->ID, 'gt_member_linkedin', true)) { ?>
							<a href="<?php echo get_post_meta($post->ID, 'gt_member_linkedin', true) ?>"><i class="icon-linkedin icon-large"></i></a>
						<?php } if (get_post_meta($post->ID, 'gt_member_pinterest', true)) { ?>
							<a href="<?php echo get_post_meta($post->ID, 'gt_member_pinterest', true) ?>"><i class="icon-pinterest icon-large"></i></a>
						<?php } if (get_post_meta($post->ID, 'gt_member_googleplus', true)) { ?>
							<a href="<?php echo get_post_meta($post->ID, 'gt_member_googleplus', true) ?>"><i class="icon-google-plus icon-large"></i></a>
						<?php } ?>
						</div>	
					
					</div><!-- end .team-member -->
					
					<?php endwhile; ?>
						
				</div><!-- end .row -->
					
			</div><!-- end .container -->
					
		</section><!-- end #meet-the-team -->
		
	</div><!-- end #main -->
	
<?php get_footer(); ?>