<?php
/**
 *
 * Template Name: Wishlist new
 * Description: Page template to display the portfolio index page.
 *
 */
/*session_start();

    $digit1 = mt_rand(1,20);
    $digit2 = mt_rand(1,20);
    if( mt_rand(0,1) === 1 ) {
            $math = "$digit1 + $digit2";
            $_SESSION['answer'] = $digit1 + $digit2;
    } else {
            $math = "$digit1 - $digit2";
            $_SESSION['answer'] = $digit1 - $digit2;
    }

print_r($_SESSION);*/
//print_r($_COOKIE['wp-favorite-posts']);
$results_tb = $_COOKIE['wp-favorite-posts'];
get_header(); ?>

	<div id="main">
		
		<div class="container">
		
			<section id="content" class="row">
            <?php while ( have_posts() ) : the_post(); ?>
            	<?php the_content(); ?>
            <?php endwhile; ?>
            </section>	 


        <!--<a href="#" class="printarea">Print</a> -->
		</div><!-- end .container -->
			
	</div><!-- end #main -->
		
<?php get_footer(); ?>