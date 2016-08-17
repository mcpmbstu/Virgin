<?php 
wp_reset_query();
if(is_page(58)){ ?>
	<style type="text/css">
    	#footer-global[role="contentinfo"]{
			background-image: url(<?php echo get_template_directory_uri(); ?>/images/footer-get-in-touch.png);
			background-color: #637a92;
		}
		#footer-global[role="contentinfo"]  #contact-details{ margin-top: 78px; }
		#get_in_touch{ display: none; }
		
	
    </style>
<?php } ?>
	<footer id="footer-global" role="contentinfo" class="clearfix">
				
		<div id="contact-details">
		
			<div class="container">
		
				<div class="one-third column">
				
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer-sidebar-1") ) : ?>
					<?php endif; ?>
				
				</div>
				
				<div class="one-third column">
					
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer-sidebar-2") ) : ?>
					<?php endif; ?>
				
				</div>
				
				<div class="one-third column">
					
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer-sidebar-3") ) : ?>
					<?php endif; ?>
				
				</div>
                
                <div class="one-third column last-col">
					
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer-sidebar-4") ) : ?>
					<?php endif; ?>
				
				</div>
		
			</div><!-- end .container -->
		
		</div><!-- end #contact-details -->
	
		<div class="container">
	
			<div class="sixteen columns bottomFooter">
		  	  
	  			<p id="copyright-details">&copy; <?php echo date('Y') ?> <?php echo bloginfo('name'); ?>. <?php global $data; echo $data['textarea_footer_text']; ?></p>
	  		
	  		</div>	  
		  	
		</div><!-- end .container -->
		
	</footer><!-- end #footer-global -->
	
	<div id="back-to-top" style="display: block;">
				
		<a href="#"></a>
			
	</div><!-- end #back-to-top -->
<!--<div id="div_session_write"><?php echo $some_cookie = $_COOKIE['the_cookie']; ?></div>	-->
<!--<form action="<?php echo get_template_directory_uri(); ?>/session_write.php" class="testForm" method="post">
<input type="hidden" name="number" id="number" value="<?php echo $_SESSION['number']; ?>" />
</form>-->
		
<?php wp_footer(); ?>

<!--<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.printarea.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/core.js"></script>-->
<script type="text/javascript" charset="utf-8" src="<?php echo get_template_directory_uri(); ?>/jquery.cookie.js"></script>
<script type="text/javascript">
jQuery( document ).ready(function() {
	var addressValue;
	jQuery(".ezcol a img").click(function () {
        addressValue = jQuery(this).attr("title");
		//alert(addressValue);
		//alert(addressValue);
		jQuery.removeCookie('the_cookie');
		jQuery.cookie('the_cookie', addressValue);
		e.preventDefault(); // prevent the link's default behaviour
    });	
	
	jQuery(".special-class a").click(function () {
        addressValue = jQuery(this).attr("title");
		jQuery.removeCookie('the_cookie');
		jQuery.cookie('the_cookie', addressValue);
		e.preventDefault(); // prevent the link's default behaviour
		alert(addressValue);
    });	
});
</script>
</body>
<script type="text/javascript">
	var addressValue;
	jQuery(".special-class a").click(function () {
        addressValue = jQuery(this).attr("title");
		jQuery.removeCookie('the_cookie');
		jQuery.cookie('the_cookie', addressValue);
		e.preventDefault(); // prevent the link's default behaviour
		alert(addressValue);
    });	
	
</script>
</html>