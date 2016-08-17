<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories = array();  
		$of_categories_obj = get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp = array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages = array();
		$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp = array_unshift($of_pages, "Select a page:");       
	
		$of_options_select = array("one","two","three","four","five"); 
		$of_options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		$of_options_slider_select = array("2","3","4","5","6","7","8","9","10");
		$of_options_latest_work_select = array("3","6","9","12");
		$of_options_quotes_select = array("2","3","4","5","6","7","8","9","10");
		$of_options_services_select = array("3","6","9","12");
		$of_options_meet_team_select = array("3","6","9","12");
		$of_options_recent_news_select = array("3","6","9","12");
		
		//Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"enabled" => array (
				"placebo" => "placebo", //REQUIRED!
				"slider_block" => "Slider",
				"introduction_block" => "Introduction",
				"latest_work_block"	=> "Latest Work",
				"quotes_block" => "Quotes",
				"services_block" => "Services",
				"team_block" => "Meet The Team",
				"logos_block" => "Client Logos",
				"latest_news_block"	=> "Latest News",
			),
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/assets/img/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/assets/img/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		
		$of_options_portfolio_columns = array("1" => "2 Column Portfolio","2" => "3 Column Portfolio","3" => "4 Column Portfolio");
		
		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr = wp_upload_dir();
		$all_uploads_path = $uploads_arr['path'];
		$all_uploads = get_option('of_uploads');
		$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

$of_options[] = array( "name" => __('Home Settings', 'golden'),
					"type" => "heading");
					
$of_options[] = array( "name" => __('Homepage Layout Manager', 'golden'),
					"desc" => __('Organize how you want the layout to appear on the homepage.<br /><br />You can choose to enable/disable sections via drag & drop, or re-order their stacking order on the homepage.', 'golden'),
					"id" => "homepage_blocks",
					"std" => $of_options_homepage_blocks,
					"type" => "sorter");
					
$of_options[] = array( "name" => __('Slider', 'golden'),
					"desc" => __('Please select how many items you would like featured on your homepage Slider.', 'golden'),
					"id" => "select_slider",
					"std" => "3",
					"type" => "select",
					"class" => "tiny",
					"options" => $of_options_slider_select);
					
$of_options[] = array( "name" => __('Introduction', 'golden'),
					"desc" => __('You can add a short introduction to appear on your homepage.<br /><br /><em>*HTML tags are allowed.</em>', 'golden'),
					"id" => "textarea_introduction",
					"std" => "",
					"type" => "textarea");
					
$of_options[] = array( "name" => __('Latest Work', 'golden'),
					"desc" => __('Please enter a title for the latest work section. (eg; What is in the works)', 'golden'),
					"id" => "text_latest_work_title",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "desc" => __('You can add a short overview to appear above your latest items.<br /><br /><em>*HTML tags are allowed.</em>', 'golden'),
					"id" => "textarea_latest_work_overview",
					"std" => "",
					"type" => "textarea");

$of_options[] = array( "desc" => __('Please select how many items you would like to show on the latest work section.', 'golden'),
					"id" => "select_latest_work",
					"std" => "6",
					"type" => "select",
					"class" => "tiny",
					"options" => $of_options_latest_work_select);
					
$of_options[] = array( "name" => __('Quotes', 'golden'), 
					"desc" => __('Please select how many quotes you would like to show on the homepage.', 'golden'),
					"id" => "select_quotes",
					"std" => "4",
					"type" => "select",
					"class" => "tiny",
					"options" => $of_options_quotes_select);
					
$of_options[] = array( "name" => __('Services', 'golden'),
					"desc" => __('Please enter a title for the services section. (eg; What we offer you)', 'golden'),
					"id" => "text_services_title",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "desc" => __('You can add a short overview to appear above your service items.<br /><br /><em>*HTML tags are allowed.</em>', 'golden'),
					"id" => "textarea_services_overview",
					"std" => "",
					"type" => "textarea");

$of_options[] = array( "desc" => __('Please select how many items you would like to show on the services section.', 'golden'),
					"id" => "select_services",
					"std" => "3",
					"type" => "select",
					"class" => "tiny",
					"options" => $of_options_services_select);
					
$of_options[] = array( "name" => __('Meet the Team', 'golden'),
					"desc" => __('Please enter a title for the meet the team section. (eg; Meet the dream team)', 'golden'),
					"id" => "text_meet_team_title",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "desc" => __('You can add a short overview to appear above your team members.<br /><br /><em>*HTML tags are allowed.</em>', 'golden'),
					"id" => "textarea_meet_team_overview",
					"std" => "",
					"type" => "textarea");

$of_options[] = array( "desc" => __('Please select how many items you would like to show on the meet the team section.', 'golden'),
					"id" => "select_meet_team",
					"std" => "3",
					"type" => "select",
					"class" => "tiny",
					"options" => $of_options_meet_team_select);
					
$of_options[] = array( "name" => __('Client Logo One', 'golden'),
					"desc" => __('Upload client logos to appear in this section. Choose an image around 100px wide to achieve the best layout.', 'golden'),
					"id" => "client_logo_one",
					"std" => "",
					"mod" => "min",
					"type" => "media");
					
$of_options[] = array( "name" => __('Client Logo One (URL)', 'golden'),
					"desc" => __('Please enter a URL for your logo to link to. (eg; http://guuthemes.com)', 'golden'),
					"id" => "text_client_logo_one_url",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __('Client Logo Two', 'golden'),
					"id" => "client_logo_two",
					"std" => "",
					"mod" => "min",
					"type" => "media");
					
$of_options[] = array( "name" => __('Client Logo Two (URL)', 'golden'),
					"desc" => __('Please enter a URL for your logo to link to. (eg; http://guuthemes.com)', 'golden'),
					"id" => "text_client_logo_two_url",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __('Client Logo Three', 'golden'),
					"id" => "client_logo_three",
					"std" => "",
					"mod" => "min",
					"type" => "media");
					
$of_options[] = array( "name" => __('Client Logo Three (URL)', 'golden'),
					"desc" => __('Please enter a URL for your logo to link to. (eg; http://guuthemes.com)', 'golden'),
					"id" => "text_client_logo_three_url",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __('Client Logo Four', 'golden'),
					"id" => "client_logo_four",
					"std" => "",
					"mod" => "min",
					"type" => "media");
					
$of_options[] = array( "name" => __('Client Logo Four (URL)', 'golden'),
					"desc" => __('Please enter a URL for your logo to link to. (eg; http://guuthemes.com)', 'golden'),
					"id" => "text_client_logo_four_url",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __('Client Logo Five', 'golden'),
					"id" => "client_logo_five",
					"std" => "",
					"mod" => "min",
					"type" => "media");
					
$of_options[] = array( "name" => __('Client Logo Five (URL)', 'golden'),
					"desc" => __('Please enter a URL for your logo to link to. (eg; http://guuthemes.com)', 'golden'),
					"id" => "text_client_logo_five_url",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __('Client Logo Six', 'golden'),
					"id" => "client_logo_six",
					"std" => "",
					"mod" => "min",
					"type" => "media");
					
$of_options[] = array( "name" => __('Client Logo Six (URL)', 'golden'),
					"desc" => __('Please enter a URL for your logo to link to. (eg; http://guuthemes.com)', 'golden'),
					"id" => "text_client_logo_six_url",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __('Recent News', 'golden'),
					"desc" => __('Please enter a title for the recent news section. (eg; Read all about it)', 'golden'),
					"id" => "text_recent_news_title",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "desc" => __('You can add a short overview to appear above your recent news items.<br /><br /><em>*HTML tags are allowed.</em>', 'golden'),
					"id" => "textarea_recent_news_overview",
					"std" => "",
					"type" => "textarea");

$of_options[] = array( "desc" => __('Please select how many items you would like to show on the recent news section.', 'golden'),
					"id" => "select_recent_news",
					"std" => "3",
					"type" => "select",
					"class" => "tiny",
					"options" => $of_options_recent_news_select);
					
$of_options[] = array( "name" => __('General Settings', 'golden'),
                    "type" => "heading");
					
$of_options[] = array( "name" => __('Custom Favicon', 'golden'),
					"desc" => __('Upload a 32px x 32px PNG/GIF image that will represent your website favicon.', 'golden'),
					"id" => "custom_favicon",
					"std" => "",
					"mod" => "min",
					"type" => "upload");   

$of_options[] = array( "name" => __('Text Logo', 'golden'),
					"desc" => __('Choose to use just a text logo. If you choose not to, you can upload a logo below.', 'golden'),
					"id" => "text_logo",
					"std" => false,
					"type" => "checkbox");

$of_options[] = array( "name" => __('Custom Logo', 'golden'),
					"desc" => __('Upload your own logo to use on the site.', 'golden'),
					"id" => "custom_logo",
					"std" => "",
					"mod" => "min",
					"type" => "media");
					
$of_options[] = array( "name" => __('Footer Text', 'golden'),
					"desc" => __('Please enter the text to appear at the bottom of your Footer (eg; All rights reserved. Designed by GuuThemes.)', 'golden'),
					"id" => "textarea_footer_text",
					"std" => "",
					"type" => "textarea");
                
$of_options[] = array( "name" => __('Google Analytics Tracking Code', 'golden'),
					"desc" => __('Paste your Google Analytics tracking code here. This will be added into the footer template of your theme.<br /><br />Do not have Google Analytics? Visit this <a href="http://www.google.com/analytics">link</a> to find out more.', 'golden'),
					"id" => "google_analytics",
					"std" => "",
					"type" => "textarea"); 
					
$of_options[] = array( "name" => __('Styling Options', 'golden'),
					"type" => "heading");                                                    

$of_options[] = array( "name" => __('Text Logo Styling', 'golden'),
					"desc" => __('Specify the text logo font properties (if you chose this option on the previous page).', 'golden'),
					"id" => "logo_font",
					"std" => array('size' => '39px','face' => 'pacifico','style' => 'normal','color' => '#333333'),
					"type" => "typography");
					
$of_options[] = array( "name" => __('Body Font Styling', 'golden'),
					"desc" => __('Specify the body font properties.', 'golden'),
					"id" => "body_font",
					"std" => array('size' => '14px','face' => 'georgia','style' => 'normal','color' => '#333333'),
					"type" => "typography");
					
$of_options[] = array( "name" => __('Headings Styling', 'golden'),
					"desc" => __('Specify the h1, h2, h3, h4, h5 font properties.', 'golden'),
					"id" => "headings_font",
					"std" => array('face' => 'oswald','style' => 'normal','color' => '#333333'),
					"type" => "typography");

$of_options[] = array( "name" =>  __('Accent Color', 'golden'),
					"desc" => __('Pick an accent color for the theme. (This will affect Header Navigation, Portfolio Filter, Quotes, Blockquotes, Skill Bars, Pricing Tables, Tabs, Post Navigation, Portfolio Navigation, Contact page Social Icons & Back to Top button).', 'golden'),
					"id" => "accent_color",
					"std" => "#e15154",
					"type" => "color");
					
$of_options[] = array( "name" =>  __('Button Color', 'golden'),
					"desc" => __('Pick an accent color for the buttons.', 'golden'),
					"id" => "accent_color_button",
					"std" => "#e15154",
					"type" => "color");
					
$of_options[] = array( "name" =>  __('Body Link Color', 'golden'),
					"desc" => __('Pick an accent color for the main body links.', 'golden'),
					"id" => "body_link_color",
					"std" => "#e15154",
					"type" => "color");
					
$of_options[] = array( "name" =>  __('Footer Link Color', 'golden'),
					"desc" => __('Pick an accent color for the footer text links.', 'golden'),
					"id" => "footer_link_color",
					"std" => "#e15154",
					"type" => "color");
					
$of_options[] = array( "name" =>  __('Service Icons Color', 'golden'),
					"desc" => __('Pick an accent color for the service icons.', 'golden'),
					"id" => "accent_color_service_icons",
					"std" => "#333333",
					"type" => "color");
					
$of_options[] = array( "name" =>  __('Team Member Social Icons Color', 'golden'),
					"desc" => __('Pick an accent color for the team member social icons.', 'golden'),
					"id" => "accent_color_team_icons",
					"std" => "#e15154",
					"type" => "color");
					
$of_options[] = array( "name" =>  __('Slider Title/Page Title Background Color', 'golden'),
					"desc" => __('Pick an accent color for the background of your slider, and page titles.', 'golden'),
					"id" => "accent_color_title_background",
					"std" => "#333333",
					"type" => "color");
					
$of_options[] = array( "name" => __('Background Images', 'golden'),
					"desc" => __('Select a background pattern to use with your theme.', 'golden'),
					"id" => "custom_bg",
					"std" => $bg_images_url."default.png",
					"type" => "tiles",
					"options" => $bg_images,
					); 
					
$of_options[] = array( "name" => __('Custom CSS', 'golden'),
                    "desc" => __('Quickly add some CSS to your theme by adding it to this block.', 'golden'),
                    "id" => "custom_css",
                    "std" => "",
                    "type" => "textarea");
                    
$of_options[] = array( "name" => __('Portfolio Settings', 'golden'),
					"type" => "heading");

$of_options[] = array( "name" => __('Portfolio Columns', 'golden'),
					"desc" => __('Choose the column count for your Portfolio display.', 'golden'),
					"id" => "select_portfolio_columns",
					"std" => "3 Column Portfolio",
					"type" => "select",
					"options" => $of_options_portfolio_columns);
					
$of_options[] = array( "name" => __('Button Title (Thumbnails)', 'golden'),
					"desc" => __('Please enter a global name for your thumbnails button (eg; Project Overview or View Project)', 'golden'),
					"id" => "text_thumbnail_button_title",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __('Button Title (Single Project)', 'golden'),
					"desc" => __('Please enter a global name for your single project button (eg; Launch Project or Visit Website)', 'golden'),
					"id" => "text_project_button_title",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __('Portfolio Page', 'golden'),
					"desc" => __('Please choose your Portfolio page. This enables you to correctly navigate back to your portfolio from the single project pages.', 'golden'),
					"id" => "select_portfolio_page",
					"std" => "Choose your Portfolio page:",
					"type" => "select",
					"options" => $of_pages);

$of_options[] = array( "name" => __('About Settings', 'golden'),
					"type" => "heading");
	
$of_options[] = array( "name" => __('Skill One', 'golden'),
					"desc" => __('Please enter a skill you have (eg; HTML 5)', 'golden'),
					"id" => "text_skill_one",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "desc" => __('Please enter a percentage number of skill obtained (eg; 90%)', 'golden'),
					"id" => "text_skill_one_percentage",
					"std" => "",
					"type" => "text");  
					
$of_options[] = array( "name" => __('Skill Two', 'golden'),
					"desc" => __('Please enter a skill you have (eg; CSS 3)', 'golden'),
					"id" => "text_skill_two",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "desc" => __('Please enter a percentage number of skill obtained (eg; 75%)', 'golden'),
					"id" => "text_skill_two_percentage",
					"std" => "",
					"type" => "text");  
					
$of_options[] = array( "name" => __('Skill Three', 'golden'),
					"desc" => __('Please enter a skill you have (eg; jQuery)', 'golden'),
					"id" => "text_skill_three",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "desc" => __('Please enter a percentage number of skill obtained (eg; 50%)', 'golden'),
					"id" => "text_skill_three_percentage",
					"std" => "",
					"type" => "text");
				
$of_options[] = array( "name" => __('Skill Four', 'golden'),
					"desc" => __('Please enter a skill you have (eg; Coffee Making)', 'golden'),
					"id" => "text_skill_four",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "desc" => __('Please enter a percentage number of skill obtained (eg; 65%)', 'golden'),
					"id" => "text_skill_four_percentage",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => __('Contact Settings', 'golden'),
					"type" => "heading");
					
$of_options[] = array( "name" => __('Google Map', 'golden'),
					"desc" => __('Please enter the Latitude value for your location. (eg; 53.481508)', 'golden'),
					"id" => "text_map_latitude",
					"std" => "",
					"type" => "text");

$of_options[] = array( "desc" => __('Please enter the Longitude value for your location. (eg; -2.250613)', 'golden'),
					"id" => "text_map_longitude",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "desc" => __('Please enter a brief snippet of text to appear on your Map Marker. (eg; You can find us here.)', 'golden'),
					"id" => "text_map_marker",
					"std" => "",
					"type" => "text");					

$of_options[] = array( "name" => __('Contact Address', 'golden'),
					"desc" => __('Please enter your company address (eg; 10 Columbus Circle, New York, NY 10019, United States.)', 'golden'),
					"id" => "text_contact_address",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => __('Contact Telephone Number', 'golden'),
					"desc" => __('Please enter your company telephone number (eg; (212) 823-6000.)', 'golden'),
					"id" => "text_contact_telephone",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => __('Contact Fax Number', 'golden'),
					"desc" => __('Please enter your company fax number (eg; (212) 823-6001.)', 'golden'),
					"id" => "text_contact_fax",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => __('Contact Email', 'golden'),
					"desc" => __('Please enter your company email address (eg; davesmith@guuthemes.com.) This email address will also populate in your TO field for the Contact Form.', 'golden'),
					"id" => "text_contact_email",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __('Twitter', 'golden'),
					"desc" => __('Enter your Twitter Profile URL <br />(ie; http://twitter.com/guuthemes)', 'golden'),
					"id" => "text_twitter_profile",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => __('Facebook', 'golden'),
					"desc" => __('Enter your Facebook Profile URL <br />(ie; http://facebook.com/guuthemes)', 'golden'),
					"id" => "text_facebook_profile",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __('Dribbble', 'golden'),
					"desc" => __('Enter your Dribbble Profile URL <br />(ie; http://dribbble.com/guuthemes)', 'golden'),
					"id" => "text_dribbble_profile",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __('Forrst', 'golden'),
					"desc" => __('Enter your Forrst Profile URL <br />(ie; http://forrst.com/people/guuthemes)', 'golden'),
					"id" => "text_forrst_profile",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __('Vimeo', 'golden'),
					"desc" => __('Enter your Vimeo Profile URL <br />(ie; http://vimeo.com/guuthemes)', 'golden'),
					"id" => "text_vimeo_profile",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __('YouTube', 'golden'),
					"desc" => __('Enter your YouTube Profile URL <br />(ie; http://youtube.com/user/guuthemes)', 'golden'),
					"id" => "text_youtube_profile",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __('Flickr', 'golden'),
					"desc" => __('Enter your Flickr Profile URL <br />(ie; http://flickr.com/people/guuthemes)', 'golden'),
					"id" => "text_flickr_profile",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => __('Linkedin', 'golden'),
					"desc" => __('Enter your Linkedin Profile URL <br />(ie; http://linkedin.com/in/guuthemes', 'golden'),
					"id" => "text_linkedin_profile",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __('Pinterest', 'golden'),
					"desc" => __('Enter your Pinterest Profile URL <br />(ie; http://pinterest.com/guuthemes)', 'golden'),
					"id" => "text_pinterest_profile",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __('Google +', 'golden'),
					"desc" => __('Enter your Google + Profile URL <br />(ie; http://plus.google.com/1030594445)', 'golden'),
					"id" => "text_googleplus_profile",
					"std" => "",
					"type" => "text"); 
					
// Backup Options
$of_options[] = array( "name" => __('Backup Options', 'golden'),
					"type" => "heading");
					
$of_options[] = array( "name" => __('Backup and Restore Options', 'golden'),
                    "id" => "of_backup",
                    "std" => "",
                    "type" => "backup",
					"desc" => __('You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.', 'golden'),
					);
					
$of_options[] = array( "name" => __('Transfer Theme Options Data', 'golden'),
                    "id" => "of_transfer",
                    "std" => "",
                    "type" => "transfer",
					"desc" => __('You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".
						', 'golden'),
					);
					
	}
}
?>