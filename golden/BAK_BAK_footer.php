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
	
<?php echo $data['google_analytics']; ?>
	
<?php wp_footer(); ?>

</body>

</html>