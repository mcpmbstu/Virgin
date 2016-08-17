<?php
/**
 *
 * Description: Page template to display post archives.
 *
 */
get_header(); ?>

	<div id="main">
	
		<section id="page-feature-image">
				
			<div class="row">
	
			<?php
			if (is_archive()) {
			    $id = get_option('page_for_posts');
			    if (has_post_thumbnail($id)) {
			        echo get_the_post_thumbnail($id, 'full');
			    }
			    if (get_post_meta($id)) {
			        echo '<div class="feature-caption">';
			        echo '<h1 class="feature-title">';
			        echo '<span>';
			        echo get_post_meta($id, 'gt_page_strapline', true);
			        echo '</span>';
			        echo '</h1>';
			        echo '</div>';
			    }
			}
			?>
		
			</div><!-- end .row -->
		
		</section><!-- end #page-feature-image -->
	
		<div class="container">
	
			<section id="recent-news" class="row">
				
				<div class="sixteen columns">
				
					<section id="post-content" class="ten columns alpha">
					
					<?php if (is_category()) { ?>
						<h1 class="archive-title"><?php _e('Posts in the Category:', 'golden'); ?> <?php single_cat_title(); ?></h1>
	
					<?php } elseif (is_tag()) { ?> 
						<h1 class="archive-title"><?php _e('Posts Tagged with:', 'golden'); ?> <?php single_tag_title(); ?></h1>
						
					<?php } elseif (is_author()) { ?>
						<h1 class="archive-title"><?php _e('Posts By:', 'golden'); ?> <?php $curauth = get_userdata( get_query_var('author') );  ?><?php echo $curauth->display_name; ?></h1>
	
					<?php } elseif (is_day()) { ?>
						<h1 class="archive-title"><?php _e('Daily Archives:', 'golden'); ?> <?php the_time('F jS, Y'); ?></h1>
	
					<?php } elseif (is_month()) { ?>
						<h1 class="archive-title"><?php _e('Monthly Archives:', 'golden'); ?> <?php the_time('F, Y'); ?></h1>
	
					<?php } elseif (is_year()) { ?>
						<h1 class="archive-title"><?php _e('Yearly Archives:', 'golden'); ?> <?php the_time('Y'); ?></h1>
								
					<?php } ?>
						
						<?php
						if (have_posts()):
						    while (have_posts()):
						        the_post();
						        if (!get_post_format()) {
						            get_template_part('includes/format', 'standard');
						        } else {
						            get_template_part('includes/format', get_post_format());
						        }
						    endwhile;
						endif;
						?>
						
					    <?php if(function_exists('wp_pagenavi')) { ?>
					    <?php wp_pagenavi(); ?>   
					    <?php } else { ?>      
					      <div class="post-navigation"><p><?php posts_nav_link('&#8734;','&laquo;&laquo; Previous Posts','Older Posts &raquo;&raquo;'); ?></p></div>
					    <?php } ?>
						
					</section><!-- end #post-content -->

					<?php get_sidebar(); ?>
				
				</div><!-- end .sixteen columns -->
					
			</section><!-- end #recent-news -->
			
		</div><!-- end .container -->
			
	</div><!-- end #main -->

<?php get_footer(); ?>