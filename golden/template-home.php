<?php
/**
 *
 * Template Name: Home
 * Description: Page template to display the custom homepage.
 *
 */

get_header(); ?>

	<div id="main">
	
		<section id="content-slider">
		
			<div class="row">
			
				<?php
	          	$layout = $data['homepage_blocks']['enabled'];
				if ($layout):
				foreach ($layout as $key=>$value) {
					switch($key) {
					case 'slider_block':
	          	?>
			
		  		<div id="main-slider" class="flexslider">
				    
				    <ul class="slides">
				    
				    <?php
				    global $data;
				    
				    $args = array('post_type' => 'slider', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => $data['select_slider']);
				    $loop = new WP_Query($args);
				    while ($loop->have_posts()) : $loop->the_post(); ?>
				    
				        <li>
				        	<?php the_post_thumbnail('large-slider-thumb'); ?>
				        	<div class="flex-caption">
					        	<div class="details">
					        		<h1 class="flex-title"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><br /><span><?php the_title(); ?></span></h1>
					        		<p><?php echo get_post_meta($post->ID, 'gt_slide_caption', true) ?></p>
					        		<a class="read-more-btn" href="<?php echo get_post_meta($post->ID, 'gt_slide_url', true) ?>"><?php echo get_post_meta($post->ID, 'gt_slide_button_title', true) ?> &rarr;</a>
					        	</div>
					        </div>
				        </li>
				        
				    <?php endwhile; ?>
				    
				    </ul><!-- end .slides -->
		  		
		  		</div><!-- end #main-slider -->
			
			</div><!-- end .row -->
		
		</section><!-- end #content-slider -->
		
		<?php
		break;
		case 'introduction_block':
		?>
		
		<section id="introduction">
		
			<div class="container">
		
				<div class="row">
				
					<div class="sixteen columns">
						
						<p><?php echo $data['textarea_introduction']; ?></p>
				
					</div><!-- end .sixteen columns -->
			
				</div><!-- end .row -->
		
			</div><!-- end .container -->
		
		</section><!-- end #introduction -->
	<br/><br/>	
	<div class="container">
	    <h2 class="home_class" style="text-align: center;">Brands we have worked with</h2>
	    <?php echo do_shortcode('[ihrss-gallery type="GROUP1" w="940" h="100" speed="1" bgcolor="#FFFFFF" gap="10" random="NO"]'); ?>
	</div> 
		
		<?php
		break;
		case 'latest_work_block':
		?>
		
		<section id="latest-work">
				
			<div class="container">
				
				<header class="section-heading row">
								
					<div class="sixteen columns">
					
					<?php if ($data["text_latest_work_title"]) { ?>
						<i class="icon-star-empty icon-large"></i>
						<h1><span><?php echo $data['text_latest_work_title']; ?></span></h1>
					<?php } ?>
						<p><?php echo $data['textarea_latest_work_overview']; ?></p>
					
					</div>
									
				</header>
	
				<section id="portfolio-items">
				
				<?php
				global $data;
				
				$args = array('post_type' => 'portfolio', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => $data['select_latest_work']);
				$loop = new WP_Query($args);
				while ($loop->have_posts()) : $loop->the_post(); ?>

                   <div <?php post_class("one-third column"); ?> id="post-<?php the_ID(); ?>">
                       
                       <div class="project-item">
                           <?php the_post_thumbnail('portfolio-thumb'); ?>
                           <div class="overlay">
                           	<div class="details">
                   				<?php echo do_shortcode(get_post_meta($post->ID, 'gt_portfolio_icon', $single = true)) ?>
                   				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                   				<?php if ($data["text_thumbnail_button_title"]){ ?>
                   				<a class="read-more-btn" href="<?php the_permalink() ?>"><?php echo $data['text_thumbnail_button_title']; ?> &rarr;</a>
                   				<?php } ?>
                   			</div>
                           </div>
                       </div><!-- end .project-item -->
                   
                   </div><!-- end one-third column -->
                   
                <?php endwhile; ?>

				</section><!-- end #portfolio-items -->
			
			</div><!-- end .container -->

		</section><!-- end #latest-work -->
		
		<?php
		break;
		case 'quotes_block':
		?>
		
		<div class="container">
		
		<section id="latest-quotes">
		
			<div class="row">
		
				<ul id="quotes">
				
				<?php
				global $data;
				
				$args = array('post_type' => 'quotes', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => $data['select_quotes']);
				$loop = new WP_Query($args);
				while ($loop->have_posts()) : $loop->the_post(); ?>
				
					<li>
						<blockquote><?php echo get_post_meta($post->ID, 'gt_quotes_quote', true) ?></blockquote>
						<cite><?php echo get_post_meta($post->ID, 'gt_quotes_author', true) ?></cite>
					</li>
					
				<?php endwhile; ?>
				
				</ul><!-- end #quotes -->			
			
			</div><!-- end .row -->
		
		</section><!-- end #latest-quotes -->
		
		</div><!-- end .container -->
		
		<?php
		break;
		case 'services_block':
		?>
		
		<section id="our-services">
		
			<div class="container">
		
				<header class="section-heading row">
				
					<div class="sixteen columns">
					
					<?php if ($data["text_services_title"]) { ?>
						<i class="icon-star-empty icon-large"></i>
						<h1><span><?php echo $data['text_services_title']; ?></span></h1>
					<?php } ?>
						<p><?php echo $data['textarea_services_overview']; ?></p>

					</div>
				
				</header>
				
				<div class="row">
				
					<?php
					global $data;
					
					$args = array('post_type' => 'services', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => $data['select_services']);
					$loop = new WP_Query($args);
					while ($loop->have_posts()) : $loop->the_post(); ?>
				
					<div class="service one-third column">

						<?php echo do_shortcode(get_post_meta($post->ID, 'gt_service_icon', $single = true)) ?>

						<h2><?php the_title(); ?></h2>
						
						<?php the_content(); ?>
						
						<?php if (get_post_meta($post->ID, 'gt_service_button_title', true)) { ?>
						<a class="read-more-btn" href="<?php echo get_post_meta($post->ID, 'gt_service_url', true) ?>"><?php echo get_post_meta($post->ID, 'gt_service_button_title', true) ?> &rarr;</a>
						<?php } ?>
					
					</div><!-- end .service -->
					
					<?php endwhile; ?>
											
				</div><!-- end .row -->
		
			</div><!-- end .container -->
		
		</section><!-- end #our-services -->
		
		<?php
		break;
		case 'team_block':
		?>
		
		<section id="meet-the-team">
				
			<div class="container">
			
				<header class="section-heading row">
				
					<div class="sixteen columns">

					<?php if ($data["text_meet_team_title"]) { ?>
						<i class="icon-star-empty icon-large"></i>
						<h1><span><?php echo $data['text_meet_team_title']; ?></span></h1>
					<?php } ?>
						<p><?php echo $data['textarea_meet_team_overview']; ?></p>
					
					</div>
					
				</header>
				
				<div class="row">
				
					<?php
					global $data;
					
					$args = array('post_type' => 'team', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => $data['select_meet_team']);
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
		
		<?php
		break;
		case 'logos_block':
		?>
		
		<?php if ($data["client_logo_one"]) { ?>
		
		<section id="previous-clients">
				
			<div class="container">
					
				<div class="logos sixteen columns">
					
					<ul id="client-logos">
					<?php if($data["client_logo_one"]) { ?>
						<li><a href="<?php echo $data['text_client_logo_one_url']; ?>"><img src="<?php echo $data['client_logo_one']; ?>" alt="" /></a></li>
					<?php } if($data["client_logo_two"]){ ?>
						<li><a href="<?php echo $data['text_client_logo_two_url']; ?>"><img src="<?php echo $data['client_logo_two']; ?>" alt="" /></a></li>
					<?php } if($data["client_logo_three"]){ ?>
						<li><a href="<?php echo $data['text_client_logo_three_url']; ?>"><img src="<?php echo $data['client_logo_three']; ?>" alt="" /></a></li>
					<?php } if($data["client_logo_four"]){ ?>
						<li><a href="<?php echo $data['text_client_logo_four_url']; ?>"><img src="<?php echo $data['client_logo_four']; ?>" alt="" /></a></li>
					<?php } if($data["client_logo_five"]){ ?>
						<li><a href="<?php echo $data['text_client_logo_five_url']; ?>"><img src="<?php echo $data['client_logo_five']; ?>" alt="" /></a></li>
					<?php } if($data["client_logo_six"]){ ?>
						<li><a href="<?php echo $data['text_client_logo_six_url']; ?>"><img src="<?php echo $data['client_logo_six']; ?>" alt="" /></a></li>
					<?php } ?>	
					</ul>
			
				</div>
			
			</div><!--end .container -->
		
		</section><!-- end #previous-clients -->
		
		<?php } ?>
		
		<?php
		break;
		case 'latest_news_block':
		?>
					
		<section id="recent-news">
		
			<div class="container">

				<header class="section-heading row">
				
					<div class="sixteen columns">
	
					<?php if ($data["text_recent_news_title"]) { ?>
						<i class="icon-star-empty icon-large"></i>
						<h1><span><?php echo $data['text_recent_news_title']; ?></span></h1>
					<?php } ?>
						<p><?php echo $data['textarea_recent_news_overview']; ?></p>
					
					</div>
					
				</header>
				
				<div class="row">
				
					<?php
					global $data;
											
					$args = array('post_type' => 'post', 'posts_per_page' => $data['select_recent_news']);
					$loop = new WP_Query($args);
					while ($loop->have_posts()) : $loop->the_post(); ?>
				
					<article class="homepage one-third column">
					
						<div class="thumbnail">
							<?php the_post_thumbnail('recent-news-thumb'); ?>
						</div>
						
						<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
						
						<div class="meta">
							<p><?php _e('Posted in -', 'golden'); ?> <?php the_category(' & '); ?><br />on <?php the_time('F jS, Y'); ?>
							<span><i class="icon-comment"></i> <a href="<?php the_permalink(); ?>#comments"><?php $commentscount = get_comments_number(); echo $commentscount; ?> <?php _e('Comments', 'golden'); ?></a></span>
							</p>
						</div>
						
						<?php the_excerpt(); ?>
						
						<a class="read-more-btn" href="<?php the_permalink() ?>"><?php _e('Read more', 'golden'); ?> &rarr;</a>
					
					</article><!-- end article -->
										
					<?php endwhile; ?>
				
				</div><!-- end .row -->
			
			</div><!-- end .container -->

		</section><!-- end #recent-news -->
		
		<?php break; }
		} endif; ?>
									
	</div><!-- end #main -->
	
<?php get_footer(); ?>