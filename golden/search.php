<?php
/**
 *
 * Description: Page template to display search results.
 *
 */
get_header(); ?>

	<div id="main">
			
		<!--<section id="page-feature-image">
		
			<div class="row">
				
			<?php
			/*if (is_search()) {
			    $id = get_option('page_for_posts');
			    if (has_post_thumbnail($id)) {
			        echo get_the_post_thumbnail($id, 'page-feature-image');
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
			}*/
			?>
		
			</div> end .row 
		
		</section><!-- end #page-feature-image -->
		
		<div class="container">
	
			<!--<section id="recent-news" class="row">-->
            <section id="content" class="row">
			
				<div class="sixteen">
				
					<section id="post-content" class="ten alpha">
						
					<?php
					if (have_posts()):
					    while (have_posts()):
					        the_post();
					        echo '<h1>'.__('Search Results:', 'golden').'</h1>';
					        if (!get_post_format()) {
					            get_template_part('includes/format', 'standard');
					        } else {
					            get_template_part('includes/format', get_post_format());
					        }
					    endwhile;
					endif;
					?>
					
					<?php if (!have_posts()) : ?>
						
						<div id="no-posts-found" class="ten columns alpha">
							
							<i class="icon-thumbs-down"></i>
							
							<h2 class="post-title"><?php _e( '<span>Oh, that did not go so well!</span><br /> Nothing to see here!', 'golden' ); ?></h2>
							<p><?php echo __( 'Sorry, but no results were found. Please try the search again.', 'golden' ); ?></p>
						
						</div><!-- end #no-posts-found -->
						
					<?php endif; ?>
					
					<?php if(function_exists('wp_pagenavi')) { ?>
					<?php wp_pagenavi(); ?>   
					<?php } else { ?>      
					  <div class="post-navigation"><p><?php posts_nav_link('&#8734;','&laquo;&laquo; Previous Posts','Older Posts &raquo;&raquo;'); ?></p></div>
					<?php } ?>
						
					</section><!-- end #post-content -->
					
					<?php //get_sidebar(); ?>
								
				</div><!-- end .sixteen columns -->
								
			</section><!-- end #recent-news -->
							
		</div><!-- end .container -->
					
	</div><!-- end #main -->
							
<?php get_footer(); ?>