<?php
/**
 *
 * Template Name: template Category
 * Description: Page template to display the portfolio index page.
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
			
			<div class="row">
			
				<div id="portfolio-filter" class="sixteen columns">
					
					<!--<ul id="filter">
						<li><a href="#" class="current reset_class" data-filter="*"><?php _e('Our collection', 'golden'); ?></a></li>
						<?php
						/*$categories = get_categories(array(
						    'type' => 'post',
						    'taxonomy' => 'project-type',
						    'field' => array(26,161,27,160,167,202)
						));
						foreach ($categories as $category) {
						    $group = $category->slug;
						    /*echo "<li class='project-type'><a href='#' data-filter='.$group'>" . $category->cat_name . "</a></li>";
							$permalink = get_permalink( $category->cat_ID );
							echo "<li ><a href='".$permalink."' class='reset_class' title='".$category->cat_ID."'>" . $category->cat_name . "</a></li>";
						}*/
						?>
					</ul> end #filter -->
					
                    <?php wp_nav_menu( array('menu' => 'category Menu', 'menu_id' => 'filter','menu_class' => 'filter_new' )); ?>
				
				</div><!-- end #portfolio-filter -->
			
			</div><!-- end .row -->
			
			<section id="portfolio-items">
			
			<?php
			/*query_posts(array(
			    'post_type' => 'portfolio',
			    'orderby' => 'menu_order',
			    'order' => 'ASC',
			    'posts_per_page' => -1
			));*/
			//$tag_id = $_COOKIE['the_cookie'];
			/*query_posts(array(
				'post_type'	=> 'portfolio',
	'tag_id'                 => $tag_id,
	'tag_name'               => 'project-type',
			    'orderby' => 'menu_order',
				'tag__in'  => $tag_id,
			    'order' => 'ASC',
			    'posts_per_page' => -1
			));*/
			
			global $post;
			
    		$post_slug=$post->post_name;
    		
// This is for current slug name which is responsible for the current porfolio category
$terms = get_terms("project-type"); 
$count = count($terms); 

if ( $count > 0 ){ 
	foreach ( $terms as $term ) { 
		if($post_slug == $term->slug){
			$overlay_id = $term->term_id; 
		}else{
		   //echo $term->name; 
		   ;
		}
	} 
}   
	
		
			//echo $tt = get_term_by( $post_slug, '', 'project-type' );
			$args = array(
						'post_type' => 'portfolio',
						'tax_query' => array(
							array(
								'taxonomy' => 'project-type',
								'terms' => "$post_slug",
        						'field' => 'slug',
							)
						),
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'posts_per_page' => -1
					);
					query_posts($args);
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
                                asd
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
                                asd1
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
								<?php //echo do_shortcode(get_post_meta($post->ID, 'gt_portfolio_icon', $single = true)) ?>
                                <?php 	//$variable = get_field('hover_image');
										$variable = get_field('add_icon', 'project-type_'.$overlay_id);
										$image = aq_resize( $variable, 90, 90, false ); //resize & crop img
								 ?>
                                <img src="<?php echo $image; ?>" class="overlay-img" alt="" />
								<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                                <h3 class="overview-button"><a href="<?php the_permalink() ?>"><?php _e('More Info'); ?></a></h3>
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