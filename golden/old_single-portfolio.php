<?php
/**
 *
 * Description: Page template to display single portfolio items.
 *
 */
get_header(); ?>

	<div id="main">
			
		<div class="container">
		
			<div class="sixteen columns">
		
				<section id="single-project">
				
					<!--<ul class="project-nav">
					    <li class="prev"><?php next_post_link('%link', '<i class="icon-arrow-left"></i>'); ?></li>
					    <?php if ($data["select_portfolio_page"]) { ?>
					    <li class="back"><a href="<?php echo get_site_url(); ?>/<?php echo $data['select_portfolio_page']; ?>"><i class="icon-th"></i></a></li>
					    <?php } ?>
					    <li class="next">
                        	
							<?php //previous_post_link('%link', '<i class="icon-arrow-right"></i>'); ?>
                        </li>
					</ul><!-- .project-nav -->
                    <?php
					global $post;
					$terms = get_the_terms($post->id, 'project-type');
					foreach ($terms as $theterm) {    
						echo $tempId = $theterm->term_taxonomy_id;
						echo $tempId = $theterm->term_name;
						$tempId = $theterm->term_taxonomy_id;
					}
					if($tempId=='26'){
						$linkID = 253;	
					}elseif($tempId=='27'){
						$linkID = 255;
					}elseif($tempId=='161'){
						$linkID = 257;
					}elseif($tempId=='162'|| $tempId=='164'){
						$linkID = 261;
					}elseif($tempId=='163' || $tempId=='165'){
						$linkID = 263;
					}elseif($tempId=='160'){
						$linkID = 259;
					}
					?>
					<a href="http://virginiasvintagehire.co.uk/?page_id=<?php echo $linkID; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/back.png" style="text-align: right; float: right;" alt="" /></a>
					
                    <div class="clear"></div>
					
					<?php $mediaType = get_post_meta($post->ID, 'gt_portfolio_type', true); ?>
					
					<?php
					switch ($mediaType) {
					    case "Image":
					        gt_image($post->ID, 'feature-image');
					        break;
					    
					    case "Slideshow":
					        gt_gallery($post->ID, 'slideshow');
					        break;
					    
					    case "Video":
					        $embed = get_post_meta($post->ID, 'gt_portfolio_embed_code', true);
					        if (!empty($embed)) {
					            echo "<div class='video-frame'>";
					            echo stripslashes(htmlspecialchars_decode($embed));
					            echo "</div>";
					        }
					    
					    default:
					        break;
					}
					?>
					
					<div class="row">
					
						<div class="eleven columns alpha right-margin">
						
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
							<h1><span><?php the_title(); ?></span></h1>
							
							<?php the_content(); ?>
							
						<?php endwhile; endif; ?>

						</div><!-- end .eleven columns alpha -->
						
						<div class="four columns offset-by-one omega">
								
							<ul class="client-details">
							<?php if (get_post_meta($post->ID, 'gt_client_name', true)) { ?>
								<li><strong><i class="icon-user"></i></strong> <?php echo get_post_meta($post->ID, 'gt_client_name', true) ?></li>
							<?php } if (get_post_meta($post->ID, 'gt_project_date', true)) { ?>
								<li><strong><i class="icon-calendar"></i></strong> <?php echo get_post_meta($post->ID, 'gt_project_date', true) ?></li>
							<?php } ?>
							</ul>
                            
                            <div style="padding: 25px 0;">
                            <?php if (function_exists('wpfp_link')) { wpfp_link(); } ?>
                            	<?php //if ( function_exists( 'wfp_button' ) ) wfp_button(); ?>
                                <?php //wpfp_link() ?> 
                                <?php //echo do_shortcode('[wpfp-link]'); ?>
                                <?php //echo do_shortcode('[favorite-post-btn]'); ?>
                                 <a class="wishlist-link" href="<?php echo site_url(); ?>/?page_id=684" data-id="<?php echo $post_id; ?>"><?php _e( 'View Wishlists'); ?></a>
                            </div><!--end-->
                            
                            <?php //dynamic_sidebar('wishlist-sidebar'); ?>
							
							
							<?php if (get_post_meta($post->ID, 'gt_project_checklist', true)) { ?>
							<ul class="project-checklist">
							<?php $figures = explode(',',get_post_meta($post->ID, 'gt_project_checklist', true));
							     if($figures) {
							         foreach ($figures as $figure) { ?>
								<li><strong><i class="icon-check"></i></strong> <em><?php echo $figure; ?></em></li>
								<?php }
							} ?>
							</ul>
							<?php } ?>
	
							<?php if (get_post_meta($post->ID, 'gt_project_url', true)) { ?>
							<a href="<?php echo get_post_meta($post->ID, 'gt_project_url', true) ?>" class="read-more-btn"><?php echo $data['text_project_button_title']; ?> &rarr;</a>
							<?php } ?>

						</div><!-- end .four columns offset-by-one omega -->
					
					</div><!-- end .row -->
				
				</section><!-- end #single-project -->
			
			</div><!-- end .sixteen columns -->
					
		</div><!-- end .container -->
		
	</div><!-- end #main -->
	
<?php get_footer(); ?>