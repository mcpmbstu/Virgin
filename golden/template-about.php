<?php
/**
 *
 * Template Name: About
 * Description: Page template to display the about page.
 *
 */

get_header(); ?>

	<div id="main">
		
		<section id="page-feature-image">
		
			<div class="row">
				
				<?php //the_post_thumbnail('full');
				the_post_thumbnail('full');
				?>
				
				<div class="feature-caption">
					<h1 class="feature-title"><span><?php echo get_post_meta($post->ID, 'gt_page_strapline', true) ?></span></h1>
				</div>
		
			</div><!-- end .row -->
		
		</section><!-- end #page-feature-image -->
		
		<div class="container">
		
			<section id="content" class="row">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
				<div class="sixteen columns">
					
					<?php the_content(); ?>
				
				</div><!-- end .sixteen columns -->
				
			<?php endwhile; endif; ?>
		
			</section><!-- end #content -->
			
			<div class="sixteen columns">
			
				<div class="row">
					
					<div class="skill-bars">
					    
						<div class="col">
					    	<ul id="skill">
					    	<?php if($data["text_skill_one"]) { ?>
						        <li><span class="expand mask <?php echo strtolower(str_replace(' ', '', $data['text_skill_one'])); ?>"></span><em><?php echo $data['text_skill_one']; ?></em></li>
						    <?php } if ($data["text_skill_two"]) { ?>
						        <li><span class="expand mask <?php echo strtolower(str_replace(' ', '', $data['text_skill_two'])); ?>"></span><em><?php echo $data['text_skill_two']; ?></em></li>
						    <?php } if ($data["text_skill_three"]) { ?>
						        <li><span class="expand mask <?php echo strtolower(str_replace(' ', '', $data['text_skill_three'])); ?>"></span><em><?php echo $data['text_skill_three']; ?></em></li>
						    <?php } if ($data["text_skill_four"]) { ?>
						        <li><span class="expand mask <?php echo strtolower(str_replace(' ', '', $data['text_skill_four'])); ?>"></span><em><?php echo $data['text_skill_four']; ?></em></li>
						    <?php } ?>
					        </ul>
					    </div>
					
					</div><!-- end .skill-bars -->
				
				</div><!-- end .row -->
			
			</div><!-- end .sixteen columns -->
		
		</div><!-- end .container -->
		
	</div><!-- end #main -->
	
<?php get_footer(); ?>