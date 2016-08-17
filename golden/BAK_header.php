<!DOCTYPE html>
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="ie8"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<head>

	<title>
		<?php
		/* Print the <title> tag based on what is being viewed. */
		global $page, $paged;
		wp_title( '-', true, 'right' );
		// Add the blog name.
		bloginfo( 'name' );
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' - ' . sprintf( __('Page %s', 'golden'), max( $paged, $page ) );
		?>
	</title>

	<!-- Main Stylesheets
  	================================================== -->
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/dynamic-css/options.css">
	
	<!-- Meta
	================================================== -->
	
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS2 Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<!-- Favicons
	================================================== -->
	
	<link rel="shortcut icon" href="<?php global $data; echo $data['custom_favicon']; ?>">
	<link rel="apple-touch-icon" href="<?php get_template_directory_uri(); ?>assets/img/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php get_template_directory_uri(); ?>assets/img/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php get_template_directory_uri(); ?>assets/img/apple-touch-icon-114x114.png">
	
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> >

	<header id="header-global" role="banner">
	
		<div class="container">
			
			<div class="row">
		
				<div class="header-logo three columns">
					
					<?php if ($data["text_logo"]) { ?>
						<div id="logo-default"><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></div>
					<?php } elseif ($data["custom_logo"]) { ?>
						<div id="logo"><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo $data['custom_logo']; ?>" alt="Header Logo" /></a></div>
					<?php } ?>
				  	
				</div>
				
				<nav id="header-navigation" class="thirteen columns" role="navigation">
					
				<?php
				$header_menu_args = array(
				    'menu' => 'Header',
				    'theme_location' => 'Header',
				    'container' => false,
				    'menu_id' => 'navigation'
				);
				
				wp_nav_menu($header_menu_args);
				?>
				
				</nav><!-- end #header-navigation -->
				
			</div><!-- end .row -->
		
		</div><!-- end .container -->
	
	</header><!-- end #header-global -->
