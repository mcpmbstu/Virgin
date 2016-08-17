/*---------------------- Body --------------------------*/

body {
	background: url(<?php echo $data['custom_bg']; ?>);
}

body p,
.accordion-content,
ul.tabs-content,
.toggle_container,
.meta-author,
.meta-category,
.tags,
#sidebar .widget,
#contact-details li {
	color: <?php echo $data['body_font']['color']; ?>;
	font-family: <?php echo $data['body_font']['face']; ?>;
	font-size: <?php echo $data['body_font']['size']; ?>;
	font-style: <?php echo $data['body_font']['style']; ?>;
	font-weight: <?php echo $data['body_font']['style']; ?>;
}

.item h2 span,
#featured p a:hover,
.meta-category a:visited:hover,
.meta-category a:hover,
.article span a:hover,
#single-article p a:hover,
#single-article .tags a:hover,
#contact-details a:hover,
#latest-quotes blockquote,
#single-project .client-details,
#single-project .project-checklist {
	color: <?php echo $data['body_font']['color']; ?>;
	font-family: <?php echo $data['body_font']['face']; ?>;
}

blockquote cite,
#footer-global[role="contentinfo"] .widget,
.plan-price,
.pricing-content ul li,
.dropcap,
input[type="text"],
input[type="password"],
input[type="email"],
textarea,
select,
.map-overlay,
#response,
.error {
	font-family: <?php echo $data['body_font']['face']; ?>;
}

.pagination .page-numbers {	
	font-family: <?php echo $data['body_font']['face']; ?>;
	font-size: <?php echo $data['body_font']['size']; ?>;
	font-style: <?php echo $data['body_font']['style']; ?>;
	font-weight: <?php echo $data['body_font']['style']; ?>;
}

#content p a:hover,
#recent-news .homepage p a:hover,
#recent-news .homepage .meta p a:hover,
#meet-the-team .team-member p a:hover,
#our-services p a:hover,
#introduction a:hover,
#post-content p a:hover,
#comments .author a:hover,
#comments .author a.comment-reply-link:hover,
#comments .comment-edit-link:hover,
.tags a:hover,
#sidebar .widget a:hover {
	color: <?php echo $data['body_font']['color']; ?>;
}

#content h1, 
#content h2, 
#content h3, 
#content h4, 
#content h5, 
#content h6,
#single-project h1, 
#single-project h2, 
#single-project h3, 
#single-project h4, 
#single-project h5, 
#single-project h6,
.post-title,
#sidebar h1,
#sidebar h2,
#sidebar h3,
#sidebar h4,
#sidebar h5,
#sidebar h6,
#comments h4,
.comment .author,
#respond h3,
.archive-title,
#header-navigation[role="navigation"] li a,
.flex-title,
#introduction p,
.section-heading h1,
.project-item .overlay h2,
#our-services h2,
#meet-the-team h2,
#recent-news .homepage h3,
#footer-global[role="contentinfo"] h3,
.feature-title,
#skill li em,
#content p.trigger a,
ul.tabs li a,
.must-log-in,
.logged-in-as {
	color: <?php echo $data['headings_font']['color']; ?>;
	font-family: <?php echo $data['headings_font']['face']; ?>;
	font-style: <?php echo $data['headings_font']['style']; ?>;
	font-weight: <?php echo $data['headings_font']['style']; ?>;
}

.alert-red, .alert-blue, .alert-green, .alert-brown, .alert-teal, .alert-tan,
.plan-title,
.button,
button,
input[type="submit"],
input[type="reset"],
input[type="button"],
a.button.white,
a.button.grey,
a.button.black,
a.button.red,
a.button.blue,
a.button.green,
a.button.brown,
a.button.teal,
a.button.tan,
a.read-more-btn,
a.sign-up-btn,
#latest-quotes cite,
#filter li a {
	font-family: <?php echo $data['headings_font']['face']; ?>;
	font-style: <?php echo $data['headings_font']['style']; ?>;
	font-weight: <?php echo $data['headings_font']['style']; ?>;
}


#header-navigation[role="navigation"] li a:hover,
#header-navigation[role="navigation"] li a:focus,
#header-navigation[role="navigation"] ul li.current-cat > a,
#header-navigation[role="navigation"] ul li.current_page_item > a,
#header-navigation[role="navigation"] ul li.current-menu-item > a,
#filter li a:hover,
#filter li .current {
	color: <?php echo $data['accent_color']; ?>;
}

#latest-quotes cite,
.expand,
.plan-price,
ul.tabs li a.active,
ul.tabs li a:hover,
.pagination .prev:hover,
.pagination .next:hover,
.project-nav li:hover,
.project-nav .back:hover,
#social-icons li a.twitter-link:hover,
#social-icons li a.facebook-link:hover,
#social-icons li a.dribbble-link:hover,
#social-icons li a.forrst-link:hover,
#social-icons li a.vimeo-link:hover,
#social-icons li a.youtube-link:hover,
#social-icons li a.flickr-link:hover,
#social-icons li a.linkedin-link:hover,
#social-icons li a.pinterest-link:hover,
#social-icons li a.googleplus-link:hover,
.pager a:hover {
	background-color: <?php echo $data['accent_color']; ?>;
}

#back-to-top a:hover {
	background-color: <?php echo $data['accent_color']; ?>!important;
}

blockquote {
	border-left: 3px solid <?php echo $data['accent_color']; ?>!important;
}

a.read-more-btn,
a.sign-up-btn,
.button,
button,
input[type="submit"],
input[type="reset"],
input[type="button"] {
	background-color: <?php echo $data['accent_color_button']; ?>;
}

#content p a,
#post-content p a,
#introduction a,
.section-heading a,
.service p a,
.team-member p a,
#recent-news .homepage .meta a,
#recent-news .homepage p a,
.post-excerpt a,
.meta-author a,
.meta-category a,
#comments .author a,
#comments .author a.comment-reply-link,
#comments .comment-edit-link,
.tags a,
#sidebar .widget a,
#contact-details li a,
.pagination a:hover,
.project-item .overlay h2 a:hover,
#recent-news .homepage h3 a:hover,
.post-title a:hover {
	color: <?php echo $data['body_link_color']; ?>;
}

.pagination .current,
.active-header,
.inactive-header:hover,
p.trigger a:hover,p.trigger.active a:hover,
p.trigger.active a {
	color: <?php echo $data['body_link_color']; ?>!important;
}

#footer-global[role="contentinfo"] a {
	color: <?php echo $data['footer_link_color']; ?>;
}
	
#our-services .service [class^="icon-"] {
	color: <?php echo $data['accent_color_service_icons']; ?>;
}

#meet-the-team .social-icons-small a [class^="icon-"] {
	color: <?php echo $data['accent_color_team_icons']; ?>;
}

.flex-title span,
.feature-title span {
	background-color: <?php echo $data['accent_color_title_background']; ?>;
}

.<?php echo strtolower(str_replace(' ', '', $data['text_skill_one'])); ?>       { width:<?php echo $data['text_skill_one_percentage']; ?>;  -moz-animation:<?php echo strtolower(str_replace(' ', '', $data['text_skill_one'])); ?> 2s ease-out;       -webkit-animation:<?php echo strtolower(str_replace(' ', '', $data['text_skill_one'])); ?> 2s ease-out;       }

.<?php echo strtolower(str_replace(' ', '', $data['text_skill_two'])); ?>        { width:<?php echo $data['text_skill_two_percentage']; ?>;  -moz-animation:<?php echo strtolower(str_replace(' ', '', $data['text_skill_two'])); ?> 2s ease-out;        -webkit-animation:<?php echo strtolower(str_replace(' ', '', $data['text_skill_two'])); ?> 2s ease-out;        }

.<?php echo strtolower(str_replace(' ', '', $data['text_skill_three'])); ?>      { width:<?php echo $data['text_skill_three_percentage']; ?>;  -moz-animation:<?php echo strtolower(str_replace(' ', '', $data['text_skill_three'])); ?> 2s ease-out;      -webkit-animation:<?php echo strtolower(str_replace(' ', '', $data['text_skill_three'])); ?> 2s ease-out;      }

.<?php echo strtolower(str_replace(' ', '', $data['text_skill_four'])); ?>   { width:<?php echo $data['text_skill_four_percentage']; ?>;  -moz-animation:<?php echo strtolower(str_replace(' ', '', $data['text_skill_four'])); ?> 2s ease-out;   -webkit-animation:<?php echo strtolower(str_replace(' ', '', $data['text_skill_four'])); ?> 2s ease-out;   }

@-moz-keyframes <?php echo strtolower(str_replace(' ', '', $data['text_skill_one'])); ?>       { 0%  { width:0px;} 100%{ width:<?php echo $data['text_skill_one_percentage']; ?>;}  }
@-moz-keyframes <?php echo strtolower(str_replace(' ', '', $data['text_skill_two'])); ?>        { 0%  { width:0px;} 100%{ width:<?php echo $data['text_skill_two_percentage']; ?>;}  }
@-moz-keyframes <?php echo strtolower(str_replace(' ', '', $data['text_skill_three'])); ?>      { 0%  { width:0px;} 100%{ width:<?php echo $data['text_skill_three_percentage']; ?>;}  }
@-moz-keyframes <?php echo strtolower(str_replace(' ', '', $data['text_skill_four'])); ?>   { 0%  { width:0px;} 100%{ width:<?php echo $data['text_skill_four_percentage']; ?>;}  }

@-webkit-keyframes <?php echo strtolower(str_replace(' ', '', $data['text_skill_one'])); ?>       { 0%  { width:0px;} 100%{ width:<?php echo $data['text_skill_one_percentage']; ?>;}  }
@-webkit-keyframes <?php echo strtolower(str_replace(' ', '', $data['text_skill_two'])); ?>        { 0%  { width:0px;} 100%{ width:<?php echo $data['text_skill_two_percentage']; ?>;}  }
@-webkit-keyframes <?php echo strtolower(str_replace(' ', '', $data['text_skill_three'])); ?>      { 0%  { width:0px;} 100%{ width:<?php echo $data['text_skill_three_percentage']; ?>;}  }
@-webkit-keyframes <?php echo strtolower(str_replace(' ', '', $data['text_skill_four'])); ?>   { 0%  { width:0px;} 100%{ width:<?php echo $data['text_skill_four_percentage']; ?>;}  }


/*---------------------- Custom CSS (Added from the Theme Options panel) --------------------------*/

<?php echo $data['custom_css']; ?>