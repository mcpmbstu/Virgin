<?php
/**
 *
 * Description: Page template to display all blog posts.
 *
 */

get_header(); ?>

	<div id="main">
			
		<section id="page-feature-image">
		
			<div class="row">

			<?php
			if (is_home()) {
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