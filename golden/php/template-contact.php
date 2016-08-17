<?php
/**
 *
 * Template Name: Contact
 * Description: Page template to display the contact page.
 *
 */

get_header(); ?>

	<div id="main" style="position:relative;">
	
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
		
			<section id="content" class="row">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
				<div class="sixteen columns">

					<?php the_content(); ?>
				
				</div><!-- end .sixteen columns -->
				
			<?php endwhile; endif; ?>
		
			</section><!-- end #content -->
		
		</div><!-- end .container -->
		
		<div class="container">
		
			<section id="contact">
				
				<div class="sixteen columns">
				
				<script>
				jQuery(document).ready(function($) {
				    var map;
				    map = new GMaps({
				        div: '#map',
				        lat: <?php echo $data['text_map_latitude']; ?>,
				        lng: <?php echo $data['text_map_longitude']; ?>,
				        zoomControlOptions: {
				            style: google.maps.ZoomControlStyle.SMALL,
				            position: google.maps.ControlPosition.TOP_LEFT
				        },
				        scrollwheel: true,
				        panControl: true,
				        mapTypeControl: true,
				        scaleControl: true,
				        streetViewControl: false,
				        //mapTypeId: google.maps.MapTypeId.TERRAIN
				    });
				    map.drawOverlay({
				        lat: <?php echo $data['text_map_latitude']; ?>,
				        lng: <?php echo $data['text_map_longitude']; ?>,
				        content: '<?php if($data["text_map_marker"]){ ?><div class="map-overlay"><i class="icon-pushpin icon-large"></i><br /><?php echo $data['text_map_marker']; ?><div class="map-overlay_arrow above"></div></div><?php } ?>',
				        verticalAlign: 'top',
				        horizontalAlign: 'center'
				    });
				    // The styles below present your map in Monochrome. If you would like to use a normal coloured map with your theme, then please remove the code below, from lines 77 to 232, and uncomment line 67 above.
				    var styles = [{
				        featureType: "water",
				        elementType: "all",
				        stylers: [{
				            visibility: "on"
				        }, {
				            hue: "#000000"
				        }, {
				            saturation: -40
				        }, {
				            gamma: 0.84
				        }]
				    }, {
				        featureType: "landscape.man_made",
				        elementType: "all",
				        stylers: [{
				            saturation: -40
				        }, {
				            hue: "#000000"
				        }, {
				            visibility: "off"
				        }]
				    }, {
				        featureType: "landscape",
				        elementType: "all",
				        stylers: [{
				            saturation: -100
				        }, {
				            lightness: 10
				        }, {
				            hue: "#333333"
				        }]
				    }, {
				        featureType: "administrative.land_parcel",
				        elementType: "all",
				        stylers: [{
				            visibility: "off"
				        }]
				    }, {
				        featureType: "road.local",
				        elementType: "all",
				        stylers: [{
				            saturation: -100
				        }, {
				            lightness: 5
				        }, {
				            visibility: "on"
				        }]
				    }, {
				        featureType: "poi.park",
				        elementType: "geometry",
				        stylers: [{
				            hue: "#000000"
				        }, {
				            saturation: -100
				        }, {
				            lightness: 46
				        }]
				    }, {
				        featureType: "poi",
				        elementType: "labels",
				        stylers: [{
				            hue: "#ffc300"
				        }, {
				            saturation: -100
				        }, {
				            visibility: "off"
				        }]
				    }, {
				        featureType: "road",
				        elementType: "labels",
				        stylers: [{
				            hue: "#FFFFFF"
				        }, {
				            saturation: -100
				        }, {
				            gamma: 1.5
				        }, {
				            visibility: "on"
				        }]
				    }, {
				        featureType: "landscape",
				        elementType: "labels",
				        stylers: [{
				            visibility: "off"
				        }]
				    }, {
				        featureType: "water",
				        elementType: "labels",
				        stylers: [{
				            visibility: "off"
				        }]
				    }, {
				        featureType: "water",
				        elementType: "geometry",
				        stylers: [{
				            saturation: -100
				        }, {
				            visibility: "on"
				        }]
				    }, {
				        featureType: "road.arterial",
				        elementType: "all",
				        stylers: [{
				            hue: "#ffcc00"
				        }, {
				            lightness: 30
				        }, {
				            saturation: -100
				        }]
				    }, {
				        featureType: "road.highway",
				        elementType: "geometry",
				        stylers: [{
				            hue: "#ffc300"
				        }, {
				            saturation: -100
				        }, {
				            lightness: 10
				        }]
				    }, {
				        featureType: "landscape.natural",
				        elementType: "all",
				        stylers: [{
				            visibility: "off"
				        }]
				    }, {
				        featureType: "all",
				        elementType: "all",
				        stylers: []
				    }, {
				        featureType: "poi",
				        elementType: "geometry",
				        stylers: [{
				            visibility: "off"
				        }]
				    }, {
				        featureType: "transit",
				        elementType: "labels",
				        stylers: [{
				            visibility: "off"
				        }]
				    }, {
				        featureType: "transit.line",
				        elementType: "geometry",
				        stylers: [{
				            visibility: "off"
				        }]
				    }, {
				        featureType: "all",
				        elementType: "all",
				        stylers: []
				    }];
				    map.setOptions({
				        styles: styles
				    });
				});
				</script>
				
					<div id="map"></div><!-- This is where your Google Map will be inserted (Please read the documentation about setting up your Google Map) -->
								
					<div class="row">
				
						<div class="eight columns alpha">
						
							<form id="contact-form" action="<?php echo get_template_directory_uri(); ?>/php/form.php" method="post">

								<input name="name" type="text" placeholder="Your Name (required)">

							    <input name="email" type="email" placeholder="Your Email (required)">
								<!--<label>How did you find us?</label>-->
                                <input name="get_info" type="text" placeholder="How did you find us?">
                                <!--<select name="get_info">
                                	<option value="Google">Google</option>
                                    <option value="Internet Directory">Internet Directory</option>
                                    <option value="Wedding Magazine">Wedding Magazine</option>
                                    <option value="Refferal">Refferal</option>
                                    <option value="Other">Other</option>
                                </select>-->
							    <textarea name="message" placeholder="Please enter your Message..."></textarea>
                                
                                <img src="<?php echo get_template_directory_uri(); ?>/php/captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ><br>
                                <label for='message'>Enter the code above here :</label><br>
                                <small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small>
                                <input id="letters_code" name="letters_code" type="text">
							            
							    <input id="submit" name="submit" type="submit" value="Submit">
							        
							</form>
							<script language='JavaScript' type='text/javascript'>
								function refreshCaptcha()
									{
										var img = document.images['captchaimg'];
										img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
									}
							</script>
							<div id="response"></div>

						</div>
						
						<div class="eight columns omega">
							
							<address id="contact-details">
							    
							    <ul>
							    <?php if($data["text_contact_address"]) { ?>
							    	<li><i class="icon-map-marker icon-large"></i> <?php echo $data['text_contact_address']; ?></li>
							    <?php } if ($data["text_contact_telephone"]){ ?>
							        <li><i class="icon-phone icon-large"></i> <?php echo $data['text_contact_telephone']; ?></li>
                                <?php } if ($data["text_contact_telephone2"]){ ?>
							        <li><i class="icon-phone icon-large"></i> <?php echo $data['text_contact_telephone2']; ?></li>
							    <?php } if ($data["text_contact_fax"]){ ?>
							        <li><i class="icon-print icon-large"></i> <?php echo $data['text_contact_fax']; ?></li>
							    <?php } if ($data["text_contact_email"]){ ?>
							        <li><i class="icon-envelope-alt icon-large"></i> <a href="mailto:<?php echo $data['text_contact_email']; ?>"><?php echo $data['text_contact_email']; ?></a></li>
							    <?php } ?>
                                <li><a href="<?php site_url('/'); ?>/?page_id=936"><img src="<?php echo get_template_directory_uri(); ?>/images/contacts_n.jpg" alt="" /></a></li>
							    </ul>
							
							</address>
							
							<ul id="social-icons">
								
								<?php if ($data["text_twitter_profile"]) { ?>
									<li><a href="<?php echo $data['text_twitter_profile']; ?>" class="twitter-link" title="View Twitter Profile"></a></li>
								<?php } if ($data["text_facebook_profile"]){ ?>
									<li><a href="<?php echo $data['text_facebook_profile']; ?>" class="facebook-link" title="View Facebook Profile"></a></li>
								<?php } if ($data["text_dribbble_profile"]){ ?>
									<li><a href="<?php echo $data['text_dribbble_profile']; ?>" class="dribbble-link" title="View Dribbble Profile"></a></li>
								<?php } if ($data["text_forrst_profile"]){ ?>
									<li><a href="<?php echo $data['text_forrst_profile']; ?>" class="forrst-link" title="View Forrst Profile"></a></li>
								<?php } if ($data["text_vimeo_profile"]){ ?>
									<li><a href="<?php echo $data['text_vimeo_profile']; ?>" class="vimeo-link" title="View Vimeo Profile"></a></li>
								<?php } if ($data["text_youtube_profile"]){ ?>
									<li><a href="<?php echo $data['text_youtube_profile']; ?>" class="youtube-link" title="View YouTube Profile"></a></li>
								<?php } if ($data["text_flickr_profile"]){ ?>
									<li><a href="<?php echo $data['text_flickr_profile']; ?>" class="flickr-link" title="View Flickr Profile"></a></li>
								<?php } if ($data["text_linkedin_profile"]){ ?>
									<li><a href="<?php echo $data['text_linkedin_profile']; ?>" class="linkedin-link" title="View Linkedin Profile"></a></li>
								<?php } if ($data["text_pinterest_profile"]){ ?>
									<li><a href="<?php echo $data['text_pinterest_profile']; ?>" class="pinterest-link" title="View Pinterest Profile"></a></li>
								<?php } if ($data["text_googleplus_profile"]){ ?>
									<li><a href="<?php echo $data['text_googleplus_profile']; ?>" class="googleplus-link" title="View Google + Profile"></a></li>
								<?php } ?>
								
							</ul>
						
						</div>
				
					</div><!-- end .row -->
				
				</div><!-- end .sixteen columns -->
	
			</section><!-- end #contact -->
				
		</div><!-- end .container -->
	<div id="get_in_touch"></div><!--get_in_touch-->			
	</div><!-- end #main -->

<?php get_footer(); ?>