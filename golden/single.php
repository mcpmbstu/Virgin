<?php
/**
 *
 * Description: Page template to display single blog posts.
 *
 */
get_header(); ?>

	<div id="main">
		
		<section id="page-feature-image">
		
			<div class="row">
				
			<?php
			if (is_singular()) {
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
			}
			?>
		
			</div><!-- end .row -->
		
		</section><!-- end #page-feature-image -->
		
		<div class="container">
	
			<section id="single-articles" class="row">
			
				<div class="sixteen columns">
				
					<section id="post-content" class="ten columns alpha">
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
						<article <?php post_class("single-article"); ?>>
					
							<h2 class="post-title"><?php the_title(); ?></h2>
							
							<span class="meta-author">By <?php the_author_posts_link(); ?></span>
							
							<span class="meta-category"><?php _e('Posted in', 'golden'); ?> - <?php the_category(' & '); ?> <?php _e('on', 'golden'); ?> <strong><?php the_time('F jS, Y'); ?></strong> <span class="comment-count"><a href="#comments" class="scroll"><?php $commentscount = get_comments_number(); echo $commentscount; ?></a> <?php _e('Comments', 'golden'); ?></span></span>

							<?php the_post_thumbnail('single-post'); ?>
							
							<?php the_content(); ?>
							
							<span class="tags"><i class="icon-tags"></i> <?php the_tags(' ',' '); ?></span>
												
						</article><!-- end #single-article -->
						
					<?php endwhile; endif; ?>
					
					<?php comments_template(); ?>
					
					<?php gt_content_nav('nav-below');?>
						
					</section><!-- end #post-content -->
					
					<?php get_sidebar(); ?>
								
				</div><!-- end .sixteen columns -->
								
			</section><!-- end #single-articles -->
							
		</div><!-- end .container -->
					
	</div><!-- end #main -->
							
<?php get_footer(); ?>