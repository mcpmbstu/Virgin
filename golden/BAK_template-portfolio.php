<?php
/**
 *
 * Template Name: Portfolio
 * Description: Page template to display the portfolio index page.
 *
 */

get_header(); ?>

	<div id="main">
	
		<section id="page-feature-image">
		
			<div class="row">
				
				<?php //the_post_thumbnail('page-feature-image'); ?>
				
				<div class="feature-caption">
					<h1 class="feature-title"><span><?php echo get_post_meta($post->ID, 'gt_page_strapline', true) ?></span></h1>
				</div>
		
			</div><!-- end .row -->
		
		</section><!-- end #page-feature-image -->
		
		<div class="container">
			
			<div class="row">
			
				<div id="portfolio-filter" class="sixteen columns">
					
					<ul id="filter">
						<li><a href="#" class="current" data-filter="*"><?php _e('Show all', 'golden'); ?></a></li>
						<?php
						$categories = get_categories(array(
						    'type' => 'post',
						    'taxonomy' => 'project-type'
						));
						foreach ($categories as $category) {
						    $group = $category->slug;
						    echo "<li class='project-type'><a href='#' data-filter='.$group'>" . $category->cat_name . "</a></li>";
						}
						?>
					</ul><!-- end #filter -->
				
				</div><!-- end #portfolio-filter -->
			
			</div><!-- end .row -->
			
			<section id="portfolio-items">
			
			<?php
			query_posts(array(
			    'post_type' => 'portfolio',
			    'orderby' => 'menu_order',
			    'order' => 'ASC',
			    'posts_per_page' => -1
			));
			?>
			
			<?php
			$title = get_the_title();
			if ($title == "2 Column Portfolio") $data['select_portfolio_columns'] = "2 Column Portfolio";
			if ($title == "3 Column Portfolio") $data['select_portfolio_columns'] = "3 Column Portfolio";
			if ($title == "4 Column Portfolio") $data['select_portfolio_columns'] = "4 Column Portfolio";
			?>
			
			<?php if ($data['select_portfolio_columns'] == "2 Column Portfolio") { ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php 
			    $terms =  get_the_terms( $post->ID, 'project-type' ); 
			    $term_list = '';
			    if( is_array($terms) ) {
			        foreach( $terms as $term ) {
				        $term_list .= urldecode($term->slug);
				        $term_list .= ' ';
				    }
			    }
			?>
			
				<div <?php post_class("$term_list eight columns"); ?> id="post-<?php the_ID(); ?>">
				    
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
				
				</div><!-- end .eight columns -->
			
			<?php endwhile; endif; ?>
			<?php } ?>
			
			<?php if ($data['select_portfolio_columns'] == "3 Column Portfolio") { ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php 
			    $terms =  get_the_terms( $post->ID, 'project-type' ); 
			    $term_list = '';
			    if( is_array($terms) ) {
			        foreach( $terms as $term ) {
				        $term_list .= urldecode($term->slug);
				        $term_list .= ' ';
				    }
			    }
			?>
			
				<div <?php post_class("$term_list one-third column"); ?> id="post-<?php the_ID(); ?>">
				    
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
			
			<?php endwhile; endif; ?>
			<?php } ?>
			
			<?php if ($data['select_portfolio_columns'] == "4 Column Portfolio") { ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php 
			    $terms =  get_the_terms( $post->ID, 'project-type' ); 
			    $term_list = '';
			    if( is_array($terms) ) {
			        foreach( $terms as $term ) {
				        $term_list .= urldecode($term->slug);
				        $term_list .= ' ';
				    }
			    }
			?>
			
				<div <?php post_class("$term_list four columns"); ?> id="post-<?php the_ID(); ?>">
				    
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
				
				</div><!-- end .four columns -->
			
			<?php endwhile; endif; ?>
			<?php } ?> 	
									
			</section><!-- end #portfolio-items -->
		
		</div><!-- end .container -->
		
	</div><!-- end #main -->
	
<?php get_footer(); ?>