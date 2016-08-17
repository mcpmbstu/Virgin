<?php
/**
 *
 * Template Name: Wishlist
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
            	<?php if ( is_user_logged_in() ) { ?>
						<?php dynamic_sidebar('wishlist-sidebar'); ?>
                <?php }else{ ?>        
                        
                        <?php //include('http://cmsnorthdevon5.co.uk/wp-content/themes/golden/wpfp-page-template.php'); 
						

?>


 
    <?php echo "<div class='print_list_here' style='margin: 0 0 0 20%;'>";
			echo '<div class="print_img" style="display: block; padding-bottom: 10px;">
                    	<span class="print print_icon">print</span>'; ?>
                        <!--<span class="print_email">
                        <a href="javascript:{}" name="temName" class="printing_link" onclick="document.getElementById('my_form').submit(); return false;">submit</a>
                        </span>-->
                        <span class="print_email">
                        	<a href="#loginmodal" id="modaltrigger" name="temName" class="email_send printing_link flatbtn">submit</a>
                        </span>
                        <!--<input type="submit" value="Submit" class="printing_link" name="sub" id="sub">-->
             <?php echo '<div style="clear: both; height: 0; overflow: hidden;"></div>
                    </div>'; ?> 
		<div id='wishlistContainer1'>
        <table border="1" style="border-collapse: collapse; border: 1px solid #CCC;">
          <tr>
            <th scope="col" style=" width: 40%; text-align: left; background: #CCC; line-height: 30px; border: 1px solid #CCC; padding: 5px;">
            	<h2 style="font-size: 16px; color: #b43f4c; margin-bottom:0;">Name</h2></th>
            <th scope="col" style="width: 30%; background: #CCC; line-height: 30px; border: 1px solid #CCC; padding: 5px;">
            	<h2 style="font-size: 16px; color: #b43f4c; margin-bottom:0;">Image</h2></th> 
            <th scope="col" style=" position:relative; vertical-align: middle; width: 10%; background: #CCC; line-height: 30px; border: 1px solid #CCC; padding: 5px;">
            	<h2 style="font-size: 16px; color: #b43f4c; margin-bottom:0;">Action</h2></th> 
          </tr>
          <?php
			  foreach ($results_tb as $key => $value):
				//echo get_post($key);
				//echo $key;
				$post_7 = get_post($key); 
				$title = $post_7->post_title;

				echo "<tr><td style='text-align: left; border: 1px solid #CCC; padding: 5px 10px; font-weight: bold; color: #000; vertical-align: middle;'><h1 style='font-size: 14px;'>".$title."</h1></td>";
				$feat_image = wp_get_attachment_url( get_post_thumbnail_id($key) );
				//$feat_image = aq_resize( $feat_image, 45, 45, true ); //resize & crop img
				echo "<td style='text-align: center; border: 1px solid #CCC; padding: 5px; vertical-align: middle;'><img src='".$feat_image."' title='".$title."' alt='".$title."' width='75' height='75' /></td>";
				echo '<td style="border: 1px solid #CCCCCC; padding: 5px; text-align: center; vertical-align: middle;"> <a rel="nofollow" title="Remove from favorites" href="?wpfpaction=remove&amp;postid='.$key.'" class="wpfp-link email_hide">x</a></td>';
				echo "</tr>";
			  endforeach;	
		   ?>

        </table></div>

	<?php } ?> 

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
					 <h1 style="margin-bottom:0; color: #51657e; font-size: 35px; line-height: 35px; font-family: 'Oswald';">Email Wishlist</h1>
                     <h2 style="font-size: 13px; color: #b43f4c;  font-style: normal; font-weight: normal; font-family: 'Oswald'; margin-bottom: 0;">Wishlist contents will be added into your email message</h2>
					<a class="modal_close" href="#"></a>
				</div>
               
                <form id="loginform" name="loginform" method="post" action="">
                  <label for="username">Your E-mail:</label>
                  <input type="text" name="useremail" id="useremail" class="txtfield" tabindex="1">
                  
                  <label for="password">Message:</label>
                  <input type="text" name="usersubject" id="usersubject" class="txtfield" tabindex="2">
                  
                  <!--<img src="<?php echo get_template_directory_uri(); ?>/php/captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ><br>
                <label for='message'>Enter the code above here :</label><br>
                <input id="letters_code" name="letters_code" type="text"><br>-->
                  
                   <!--What's <?php echo $math; ?> = <input name="answer" type="text" /><br />-->
                  
                  <div class="center"><input type="submit" name="loginbtn" id="loginbtn" class="flatbtn-blu hidemodal" value="Send Wishlist Email" tabindex="3"></div>
                </form>
              </div><!--end-->
              
              <div id="my_box_wellcome" style="display: none;">
                <h2 style="font-size: 13px; color: #b43f4c;  font-style: normal; font-weight: normal; font-family: 'Oswald'; margin-bottom: 0;">Your Wishlist has been sent <strong style="color: #900;">Successfully !!!</strong></h2>

              </div><!--my_box_wellcome-->
              
              <div id="my_box_errorbox" style="display: none;">
              	<h2 style="font-size: 13px; color: #b43f4c;  font-style: normal; font-weight: normal; font-family: 'Oswald'; margin-bottom: 0;">Your Email <strong style="color: #900;">did not sent Successfully</strong>, Please <strong style="color: #900;">Refresh</strong> your page and try again !!!</h2> 
              </div><!--my_box_wellcome-->
            <script type="text/javascript">
			var mathenticate = {
				bounds: {
					lower: 5,
					upper: 50
				},
				first: 0,
				second: 0,
				generate: function()
				{
					this.first = Math.floor(Math.random() * this.bounds.lower) + 1;
					this.second = Math.floor(Math.random() * this.bounds.upper) + 1;
				},
				show: function()
				{
					return this.first + ' + ' + this.second;
				},
				solve: function()
				{
					return this.first + this.second;
				}
			};
			mathenticate.generate();
			
			var $auth = jQuery('<input type="text" name="auth" class="txtfield" />');
			$auth
				.attr('placeholder', 'Write Answer')
				.insertAfter('input#usersubject');
				
			var $auth1 = jQuery('<p style="font-size: 25px; letter-spacing: -1px; padding: 10px; font-family: impact;">'+mathenticate.show()+'</p>');
			$auth1
				.insertAfter('input#usersubject');
	
	
            jQuery(function(){
				
				/*jQuery('#loginbtn').click(function(){
					jQuery('.link_list_f').css('display','none');
				});*/
				
              jQuery('#loginform').submit(function(e){
				  e.preventDefault();
				  if( $auth.val() != mathenticate.solve() )
					{
					jQuery('#my_box_errorbox').modal({
								  escapeClose: false,
								  clickClose: false,
								  showClose: true,
								  fadeDuration: 100	
							});
					}else{
						  var temVal;				  
						  
						  //temVal = jQuery('#wishlistContainer1').html();
						  
						  // varification check
						   if (jQuery.trim(jQuery("#useremail").val()) === "" || jQuery.trim(jQuery("#usersubject").val()) === "") {
								alert('you did not fill out one of the fields');
								return false;
														
							}else{
							//do the CSS here.
						  //jQuery('.link_list_f').css({'display':'none'}); 
						  //alert(temVal);				  
						  jQuery.post("<?php echo get_template_directory_uri(); ?>/emailus.php", {
							  data : jQuery("#wishlistContainer1").html(),
							  useremail:  jQuery('#useremail').val(),
							  usersubject:  jQuery('#usersubject').val()
							  })
							.success(function() { 
								//jQuery('#my_box_wellcome').modal();
								jQuery('#my_box_wellcome').modal({
									  escapeClose: false,
									  clickClose: false,
									  showClose: true,
									  fadeDuration: 100	
								});
							})
							.error(function() { 
							   jQuery('#my_box_errorbox').modal({
									  escapeClose: false,
									  clickClose: false,
									  showClose: true,
									  fadeDuration: 100	
								});
							});
							return false;	
						}
				//jQuery('.link_list_f').css('display','block');
					}
              });
              
              jQuery('#modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".modal_close, .hidemodal" });
            });
            </script>


        <!--<a href="#" class="printarea">Print</a> -->
		</div><!-- end .container -->
			
	</div><!-- end #main -->
		
<?php get_footer(); ?>