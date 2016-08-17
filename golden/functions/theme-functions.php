<?php

/*-----------------------------------------------------------------------------------*/
/* Add Strapline Meta Box to all Pages
/*-----------------------------------------------------------------------------------*/

$prefix = 'gt_';
 
$meta_box_strapline = array(
	'id' => 'strapline',
    'title' => __('Strapline', 'golden'),
    'page' => 'page',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'desc' => __('Enter a strapline to appear over your header image<br />(ie; What is it we do?)', 'golden'),
            'id' => $prefix . 'page_strapline',
            'type' => 'text'
        )
    )
);

add_action('admin_menu', 'gt_add_box_strapline');

function page_image_box() {
 	// Remove the orginal "Set Featured Image" Metabox
	remove_meta_box('postimagediv', 'page', 'side');
 	// Add it again with another title
	add_meta_box('postimagediv', __('Header Image', 'golden'), 'post_thumbnail_meta_box', 'page', 'side', 'low');
}
add_action('do_meta_boxes', 'page_image_box');

/*-----------------------------------------------------------------------------------*/
/*	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------*/

function gt_show_box_strapline() {
    global $meta_box_strapline, $post;
	
	// Use nonce for verification
	echo '<input type="hidden" name="gt_add_box_strapline_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

	echo '<table class="form-table">';
		
	foreach ($meta_box_strapline['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
			
			echo '<tr style="border-bottom:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			echo '</td></tr>';
		
		}
		
		echo '</table>';
}

add_action('save_post', 'gt_save_data_strapline');

/*-----------------------------------------------------------------------------------*/
/*	Add metabox to edit page
/*-----------------------------------------------------------------------------------*/
 
function gt_add_box_strapline() {
	global $meta_box_strapline;
	
	add_meta_box($meta_box_strapline['id'], $meta_box_strapline['title'], 'gt_show_box_strapline', $meta_box_strapline['page'], $meta_box_strapline['context'], $meta_box_strapline['priority']);
}

// Save data from meta box
function gt_save_data_strapline($post_id) {
    global $meta_box_strapline;

    // verify nonce
    if ( !isset($_POST['gt_add_box_strapline_nonce']) || !wp_verify_nonce($_POST['gt_add_box_strapline_nonce'], basename(__FILE__))) {
    	return $post_id;
    }

    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    foreach ($meta_box_strapline['fields'] as $field) { // save each option
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];

        if ($new && $new != $old) { // compare changes to existing values
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}

/*-----------------------------------------------------------------------------------*/
/* Remove Line Breaks and P tags in Shortcodes
/*-----------------------------------------------------------------------------------*/

function gt_clean_shortcodes($content){   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );
    $content = strtr($content, $array);
    return $content;
}
add_filter('the_content', 'gt_clean_shortcodes');

/*-----------------------------------------------------------------------------------*/
/* Custom function for the Comments
/*-----------------------------------------------------------------------------------*/

function gt_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
?>
	<li class="comment">
	
		<div>
			
		<?php echo get_avatar($comment, $size = '50'); ?>
		    
		    <div class="comment-meta">
		        <h5 class="author"><a href="<?php comment_author_url(); ?>" target="about_blank"><?php comment_author(); ?></a> - <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></h5>
		        <p class="date"><?php printf(__('%1$s at %2$s', 'golden'), get_comment_date(),  get_comment_time()) ?></p>
		    </div>
		    
		    <div class="comment-entry">
		    <?php comment_text() ?>
		    </div>
		
		</div>
		
		<?php if ($comment->comment_approved == '0') : ?>
			<em class="comment-moderate"><?php _e('Your comment is awaiting moderation.', 'golden') ?></em>
			<br />
		<?php endif; ?>
		
		<?php edit_comment_link(__('(Edit)', 'golden'),'  ','') ?>
		
<?php
}

/*-----------------------------------------------------------------------------------*/
/* Custom function for the Comment Form
/*-----------------------------------------------------------------------------------*/

add_filter('comment_form_defaults', 'gt_comment_form');

function gt_comment_form($form_options) {

    // Fields Array
    $fields = array(

	    'author' =>
	    '<p class="comment-form-author">' .
	    '<input id="author" name="author" type="text" size="30" placeholder="' . __( 'Your Name (required)', 'golden' ) . '" />' .
	    '</p>',
	
	    'email' =>
	    '<p class="comment-form-email">' .
	    '<input id="email" name="email" type="text" size="30" placeholder="' . __( 'Your Email (will not be published)', 'golden' ) . '" />' .
	    '</p>',
	
	    'url' =>
	    '<p class="comment-form-url">'  .
	    '<input name="url" size="30" id="url" type="text" placeholder="' . __( 'Your Website (optional)', 'golden' ) . '" />' .
	    '</p>',

    );

    // Form Options Array
    $form_options = array(
        // Include Fields Array
        'fields' => apply_filters( 'comment_form_default_fields', $fields ),

        // Template Options
        'comment_field' =>
        '<p class="comment-form-comment">' .
        '<textarea name="comment" id="comment" aria-required="true" rows="8" cols="45" placeholder="' . __( 'Please leave your comment...', 'golden' ) . '"></textarea>' .
        '</p>',

        'must_log_in' =>
        '<p class="must-log-in">' .
        sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'golden' ),
            wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ) .
        '</p>',

        'logged_in_as' =>
        '<p class="logged-in-as">' .
        sprintf( __( 'You are currently logged in<a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'golden' ),
            admin_url('profile.php'), $user_identity, wp_logout_url( apply_filters('the_permalink', get_permalink()) ) ) .
        '</p>',

        'comment_notes_before' => '',

        'comment_notes_after' => '',

        // Rest of Options
        'id_form' => 'form-comment',
        'id_submit' => 'submit',
        'title_reply' => __( 'Please leave a Comment', 'golden' ),
        'title_reply_to' => __( 'Leave a Reply to %s', 'golden' ),
        'cancel_reply_link' => __( 'Cancel reply', 'golden' ),
        'label_submit' => __( 'Post Comment', 'golden' ),
    );

    return $form_options;
}

/*-----------------------------------------------------------------------------------*/
/* Custom Navigation for Single Posts
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'gt_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 */
function gt_content_nav( $nav_id ) {
	global $wp_query;

	?>

	<?php if ( is_single() ) : // navigation links for single posts ?>
<ul class="pager">
		<?php previous_post_link( '<li class="previous">%link</li>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'golden' ) . '</span> %title' ); ?>
		<?php next_post_link( '<li class="next">%link</li>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'golden' ) . '</span>' ); ?>
</ul>

	<?php endif; ?>

	<?php
}
endif;

/*-----------------------------------------------------------------------------------*/
/* Numbered Post Navigation (for Post Index, Archives, and Search Results)
/*-----------------------------------------------------------------------------------*/

function wp_pagenavi() {
  
  global $wp_query, $wp_rewrite;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $args['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $args['total'] = $max;
  $args['current'] = $current;
 
  $total = 1;
  $args['mid_size'] = 3;
  $args['end_size'] = 1;
  $args['prev_text'] = '<i class="icon-arrow-left"></i>';
  $args['next_text'] = '<i class="icon-arrow-right"></i>';
 
  if ($max > 1) echo '</pre>
    <div class="pagination">';
 echo $pages . paginate_links($args);
 if ($max > 1) echo '</div>';

}

/*-----------------------------------------------------------------------------------*/
/* Custom function for the Excerpt
/*-----------------------------------------------------------------------------------*/

function custom_trim_excerpt($text) {
    global $post;
    if ('' == $text) {
        $text = get_the_content('');
        $text = apply_filters('the_content', $text);
        $text = str_replace('\]\]\>', ']]&gt;', $text);
        $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
        $text = strip_tags($text, '<p>,<a>,<em>,<blockquote>,<iframe>');
        $excerpt_length = 35;
        $words = explode(' ', $text, $excerpt_length + 1);
        if (count($words) > $excerpt_length) {
            array_pop($words);
            array_push($words, '...');
            $text = implode(' ', $words);
        }
    }
    return $text;
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'custom_trim_excerpt');

/*-----------------------------------------------------------------------------------*/
/* Custom Search Filter (Returns only Posts. Theme Specific)
/*-----------------------------------------------------------------------------------*/

function gt_search_filter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}

add_filter('pre_get_posts','gt_search_filter');

/*-----------------------------------------------------------------------------------*/
/* Font Awesome Shortcodes
/*-----------------------------------------------------------------------------------*/

class FontAwesome {
    public function __construct() {
        add_action( 'init', array( &$this, 'init' ) );
    }

    public function init() {
        add_action( 'wp_enqueue_scripts', array( $this, 'register_awesome_styles' ) );
        add_shortcode( 'icon', array( $this, 'setup_shortcode' ) );
        add_filter( 'widget_text', 'do_shortcode' );
    }

    public function register_awesome_styles() {
        global $wp_styles;
        wp_register_style('font-awesome-styles', get_template_directory_uri().'/style.css');
        wp_enqueue_style('font-awesome-styles');
    }

    public function setup_shortcode( $params ) {
        extract( shortcode_atts( array(
                    'name'  => 'icon-wrench'
                ), $params ) );
        $icon = '<i class="'.$params['name'].'"></i>';

        return $icon;
    }

}

new FontAwesome();

/*-----------------------------------------------------------------------------------*/
/* Output Image
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'gt_image' ) ) {
    function gt_image($postid, $imagesize) {
        // get the featured image for the post
        $thumbid = 0;
        if( has_post_thumbnail($postid) ) {
            $thumbid = get_post_thumbnail_id($postid);
        }

        $image_ids_raw = get_post_meta($postid, 'gt_image_ids', true);

        if( $image_ids_raw ) {
            // Using WP3.5; use post__in orderby option
            $image_ids = explode(',', $image_ids_raw);
            $temp_id = $postid;
            $postid = null;
            $orderby = 'post__in';
            $include = $image_ids;
        } else {
            $orderby = 'menu_order';
            $include = '';
        }
    
        // get first 10 attachments for the post
        $args = array(
            'include' => $include,
            'orderby' => $orderby,
            'post_type' => 'attachment',
            'post_parent' => $postid,
            'post_mime_type' => 'image',
            'post_status' => null,
            'numberposts' => 10
        );
        $attachments = get_posts($args);

        $postid = ( isset($temp_id) ) ? $temp_id : $postid;

        if( !empty($attachments) ) {
            foreach( $attachments as $attachment ) {
                // if current image is featured image reloop
                if( $attachment->ID == $thumbid ) continue; 
                $full = wp_get_attachment_image_src( $attachment->ID, 'full', false, false );  
                $large = wp_get_attachment_image_src( $attachment->ID, 'feature-image', false, false );
                $alt = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;
                $title = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;
                echo "<section class='portfolio-thumbs'>";
                echo '<a class="fancybox" rel="gallery" href="'.$full[0].'"><img src="'.$large[0].'" alt="'.$alt.'" /></a>';
                echo "</section>";
                // got image, time to exit foreach
                break;
            }
        }
    }
}

/*-----------------------------------------------------------------------------------*/
/* Output Slideshow
/*-----------------------------------------------------------------------------------*/

function gt_gallery($postid, $imagesize) { ?>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery(".slider").flexslider({
                    preload: true,
                    preloadImage: jQuery(".flexslider-<?php echo $postid; ?>").attr('data-loader')
                });
            });
        </script>
    <?php 
        $loader = 'loader.gif';
        $thumbid = 0;
    
        // get the featured image for the post
        if( has_post_thumbnail($postid) ) {
            $thumbid = get_post_thumbnail_id($postid);
        }
        echo "<!-- BEGIN #slider-$postid -->\n<div class='flexslider' data-loader='" . get_template_directory_uri() . "/assets/img/$loader'>";
        
        $image_ids_raw = get_post_meta($postid, 'gt_image_ids', true);

        if( $image_ids_raw ) {
            // Using WP3.5; use post__in orderby option
            $image_ids = explode(',', $image_ids_raw);
            $temp_id = $postid;
            $postid = null;
            $orderby = 'post__in';
            $include = $image_ids;
        } else {
            $orderby = 'menu_order';
            $include = '';
        }

        // get all of the attachments for the post
        $args = array(
            'include' => $include,
            'orderby' => $orderby,
            'post_type' => 'attachment',
            'post_parent' => $postid,
            'post_mime_type' => 'image',
            'post_status' => null,
            'numberposts' => -1
        );
        $attachments = get_posts($args);
        
        if( !empty($attachments) ) {
            echo '<ul class="slides">';
            $i = 0;
            foreach( $attachments as $attachment ) {
                if( $attachment->ID == $thumbid ) continue;
                $src = wp_get_attachment_image_src( $attachment->ID, $imagesize );
                $full = wp_get_attachment_image_src( $attachment->ID, 'full', false, false );
                $large = wp_get_attachment_image_src( $attachment->ID, 'large-slider-thumb', false, false );
                $caption = $attachment->post_excerpt;
                $caption = ($caption) ? "<div class='slider-desc'>$caption</div>" : '';
                $alt = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;
                echo "<li>$caption<a class='fancybox' rel='gallery' href='$full[0]'><img height='$src[2]' width='$src[1]' src='$large[0]' alt='$alt' />
                </a><a href='https://www.pinterest.com/pin/create/button/'>
                    <img src='//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png' />
                </a></li>";
                $i++;
            }
            echo '</ul>';
        }
        echo '</div>';
    }
    
/*-----------------------------------------------------------------------------------*/
/* Fixes WC3 Validation WordPress bug!!!!
/*-----------------------------------------------------------------------------------*/

add_filter( 'the_category', 'replace_cat_tag' );
 
function replace_cat_tag ( $text ) {
$text = str_replace('rel="category tag"', "", $text); return $text;
}