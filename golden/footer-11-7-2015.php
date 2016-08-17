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
<script type="text/javascript">
jQuery( document ).ready(function() {
	var addressValue1;
	jQuery(".ezcol a img").click(function () {
		jQuery.removeCookie('the_cookie');
        addressValue1 = jQuery(this).attr("title");
		//alert(addressValue);
		//alert(addressValue1);
		//jQuery.removeCookie('the_cookie');
		jQuery.cookie('the_cookie', addressValue1, {path: '/'});
		
    });	
	
	var addressValue;
	jQuery(".filter_new .special-class a").click(function () {
		jQuery.removeCookie('the_cookie');
        addressValue = jQuery(this).attr("title");
		//jQuery.removeCookie('the_cookie');
		jQuery.cookie('the_cookie', addressValue, {path: '/'});
		//alert(addressValue);
		link = jQuery(this).attr('href');
		window.location = link;
		
		
    });	
    
    var TempVal =jQuery('body.single-portfolio .right-margin p:last').html();
    TempVal = TempVal+ '+ VAT'
    jQuery('body.single-portfolio .right-margin p:last').text(TempVal);
    //alert(TempVal);
    
    
});
</script>
<?php //echo $tag_id = $_COOKIE['the_cookie']; ?>

<script type="text/javascript">
	/*var addressValue;
	jQuery(".special-class a").click(function () {
        addressValue = jQuery(this).attr("title");
		jQuery.removeCookie('the_cookie');
		jQuery.cookie('the_cookie', addressValue);
		e.preventDefault(); // prevent the link's default behaviour
		alert(addressValue);
    });	*/
	
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-28030271-1', 'virginiasvintagehire.co.uk');
  ga('send', 'pageview');

</script>
</body>
</html>