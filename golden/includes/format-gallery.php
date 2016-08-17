	<article <?php post_class("post-excerpt"); ?>>
		
		<h2 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

		<span class="meta-author">By <?php the_author_posts_link(); ?></span>

		<span class="meta-category"><?php _e('Posted in', 'golden'); ?> - <?php the_category(' & '); ?> <?php _e('on', 'golden'); ?> <strong><?php the_time('F jS, Y'); ?></strong> <span class="comment-count"><a href="<?php the_permalink(); ?>#comments"><?php $commentscount = get_comments_number(); echo $commentscount; ?></a> <?php _e('Comments', 'golden'); ?></span></span> 

		<?php the_content(); ?>
		
		<a class="read-more-btn" href="<?php the_permalink() ?>"><?php _e('Read More', 'golden'); ?> &rarr;</a>
	
	</article><!-- end .post-excerpt -->