<?php

/**

 * Template Name: Audio-Page-Content

 *

 * This is the template that displays all pages by default.

 * Please note that this is the WordPress construct of pages

 * and that other 'pages' on your WordPress site will use a

 * different template.

 *

 * @package WordPress

 * @subpackage Twenty_Twelve

 * @since Twenty Twelve 1.0

 */



get_header(); ?>
<!-- This includes the ImageFlow CSS and JavaScript -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/imageflow.css" type="text/css" />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/imageflow.js"></script>  
<?php get_sidebar('homepage'); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php //get_template_part( 'content', 'page' ); ?>
				<?php //comments_template( '', true ); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content"> 
							<?php if( have_rows('slider_images') ): ?> 
                            	<div id="audio_play">
                                    <!-- This is all the XHTML ImageFlow needs -->
									<div id="newImageFlow" class="imageflow">
                                            <?php while( have_rows('slider_images') ): the_row(); ?>
                                                	<?php 
														$tem_url = get_sub_field('slider_image');								
														$image = aq_resize( $tem_url, 400, 300, true, true, true);
													?>
                                                    <img src="<?php echo $image; ?>" longdesc="<?php echo $image; ?>" alt=""  />
                                            <?php endwhile; ?>
                                        </div><!--end-->
                                </div><!--audio_play-->
                            <?php endif; ?>  
                            
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->
                </article><!-- #post -->
			<?php endwhile; // end of the loop. ?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>