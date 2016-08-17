<?php
if(isset($_POST['sub'])) {
    $ToEmail = 'mcpmbstu@gmail.com';
    $EmailSubject = 'Contact Form';
    $mailheader = "From: " . $_POST["email"] . "\r\n";
    $mailheader .= "Reply-To: " . $_POST["email"] . "\r\n";
    $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $MESSAGE_BODY =  $_POST["divContent"];
    //$status = mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die("Failure");
	
	//$status = wp_mail( $ToEmail, $EmailSubject, $MESSAGE_BODY);
	
	$headers[] = 'From: "{{Your Name}}" ';
	$headers[] = 'Content-Type: text/html; charset="' . get_option( 'blog_charset' ) . '"';

wp_mail( $ToEmail, $EmailSubject, $MESSAGE_BODY, $headers );


}

if($status){
    echo "your success message";
}
 ?>
<?php
/**
 *
 * Template Name: Wishlist
 * Description: Page template to display the portfolio index page.
 *
 */

get_header(); ?>

	<div id="main">
		
		<div class="container">
		
			<section id="content" class="row">
						<?php dynamic_sidebar('wishlist-sidebar'); ?>
                    <div id="tempCont"></div><!--tempCont-->
                   <div class="sixteen columns">
					<!--<h2>Wishlists</h2>-->
					<?php //wpfp_list_most_favorited(20); ?>
                    <!--<div class="widget" id="top5">
                        <h1> </h1>
                        <?php //if (function_exists('wpfp_list_most_favorited')) { wpfp_list_most_favorited(); } ?>
                    </div>	-->			
				</div><!-- end .sixteen columns -->	
			
			</section><!-- end #content -->
            
            <div id="loginmodal" style="display:none;">
            	<div id="signup-header">
					 <h1 style="margin-bottom:0; color: #51657e; font-size: 40px;">Email Wishlist</h1>
                     <p style="font-size: 11px; color: #b43f4c; font-family: georgia; font-style: normal; font-weight: normal; text-transform: uppercase;">Wishlist Content Will add in your Email Content.</p>
					<a class="modal_close" href="#"></a>
				</div>
               
                <form id="loginform" name="loginform" method="post" action="">
                  <label for="username">To:</label>
                  <input type="text" name="useremail" id="useremail" class="txtfield" tabindex="1">
                  
                  <label for="password">Subject:</label>
                  <input type="text" name="usersubject" id="usersubject" class="txtfield" tabindex="2">
                  
                  <div class="center"><input type="submit" name="loginbtn" id="loginbtn" class="flatbtn-blu hidemodal" value="Send Wishlist Email" tabindex="3"></div>
                </form>
              </div><!--end-->
              
              <div id="my_box_wellcome" style="display: none;">opned the div</div><!--my_box_wellcome-->
            <script type="text/javascript">
            jQuery(function(){
              jQuery('#loginform').submit(function(e){
				  var temVal;
				  temVal = jQuery('#wishlistContainer').html();
				  
				  // varification check
				   if (jQuery.trim(jQuery("#useremail").val()) === "" || jQuery.trim(jQuery("#usersubject").val()) === "") {
						alert('you did not fill out one of the fields');
						return false;
						
					}else{
	
				  //alert(temVal);				  
				  jQuery.post("<?php echo get_template_directory_uri(); ?>/emailus.php", {
					  data : jQuery("#wishlistContainer").html(),
					  useremail:  jQuery('#useremail').val(),
					  usersubject:  jQuery('#usersubject').val()
					  },
					  function(result){
					  /* handle results */
					  //alert('Your Email Successfully Sent');
					  jQuery("#my_box_wellcome").leanModal({
						autoOpen:true,
						top: 110, 
						overlay: 0.45, 
						closeButton: ".modal_close, .hidemodal"
						});
						alert('Your Email Successfully Sent');
					})
					.error(function() { 
					   alert("If Email Not Sent then Refresh the Page"); 
					});
                	return false;	
				}
              });
              
              jQuery('#modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".modal_close, .hidemodal" });
            });
            </script>


        <!--<a href="#" class="printarea">Print</a> -->
		</div><!-- end .container -->
			
	</div><!-- end #main -->
		
<?php get_footer(); ?>