<?php

if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 250, 250, true );
}

add_action('init', 'services_register');  

function services_register() {
    $labels = array(
        'name' => __('Services', 'golden'),
        'add_new' => __('Add New', 'golden'),
        'add_new_item' => __('Add New Service', 'golden'),
        'edit_item' => __('Edit Service Item', 'golden'),
        'new_item' => __('New Service Item', 'golden'),
        'view_item' => __('View Service Item', 'golden'),
        'search_items' => __('Search Service Items', 'golden'),
        'not_found' => __('No items found', 'golden'),
        'not_found_in_trash' => __('No items found in Trash', 'golden'), 
        'parent_item_colon' => '',
        'menu_name' => 'Services'
        );
    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'rewrite' => false,
        'exclude_from_search' => true,
        'supports' => array('title','editor')
       );  

    register_post_type( 'services' , $args );
}

add_action('contextual_help', 'services_help_text', 10, 3);
function services_help_text($contextual_help, $screen_id, $screen) {
    if ('services' == $screen->id) {
        $contextual_help =
        '<h3>' . __('Things to remember when adding a Service:', 'golden') . '</h3>' .
        '<ul>' .
        '<li>' . __('Give the Service a title. (ie; Website Development or Development from the best in the game).', 'golden') . '</li>' .
        '<li>' . __('Add a short excerpt to describe your service.', 'golden') . '</li>' .
        '<li>' . __('Add a service icon (A list of all available icons can be found below).', 'golden') . '</li>' .
        '<li>' . __('Enter a URL for your Service to link to (ie; http://yoursite.com/website-development).', 'golden') . '</li>' .
        '<li>' . __('Enter a title for your Button (ie; Discover More or Read More).', 'golden') . '</li>' .
        '</ul>';
    }
    elseif ('edit-services' == $screen->id) {
        $contextual_help = '<p>' . __('A list of all services items appear below. To edit an item, click on the items title.', 'golden') . '</p>';
    }
    return $contextual_help;
}

add_filter("manage_edit-services_columns", "services_edit_columns");

function services_edit_columns($columns){
        $columns = array(
            "cb" => "<input type=\"checkbox\" />",
            "title" => "Service",
            "service_description" => "Description",
            "service_url" => "Service URL",
        );  

        return $columns;
}

add_action("manage_posts_custom_column",  "services_custom_columns"); 

function services_custom_columns($column){
        global $post;
        switch ($column)
        {

            case "service_url":
                $custom = get_post_custom();
                echo $custom["gt_service_url"][0];
                break;
            case "service_description":
                the_content();
                break;
        }
}

function enable_services_sort() {
    add_submenu_page('edit.php?post_type=services', 'Sort Services', 'Sort Service Items', 'edit_posts', basename(__FILE__), 'sort_services');
}
add_action('admin_menu' , 'enable_services_sort'); 
 
function sort_services() {
    $services = new WP_Query('post_type=services&posts_per_page=-1&orderby=menu_order&order=ASC');
?>
    <div class="wrap">
    <div id="icon-tools" class="icon32"><br /></div>
    <h2><?php _e('Sort Service Items', 'golden'); ?> <img src="<?php echo home_url(); ?>/wp-admin/images/loading.gif" id="loading-animation" /></h2>
    <p><?php _e('Click, drag, re-order. Repeat as neccessary. Service item at the top will appear first on your page.', 'golden'); ?></p>
    <ul id="post-list">
    <?php while ( $services->have_posts() ) : $services->the_post(); ?>
        <li id="<?php the_id(); ?>"><?php the_title(); ?></li>          
    <?php endwhile; ?>
    </div>
 
<?php
}

function services_print_scripts() {
    global $pagenow;
 
    $pages = array('edit.php');
    if (in_array($pagenow, $pages)) {
        wp_enqueue_script('jquery-ui-sortable');
        wp_enqueue_script('services-sorter', get_template_directory_uri().'/assets/js/jquery.posttype.sort.js');
    }
}
add_action( 'admin_print_scripts', 'services_print_scripts' );

function services_print_styles() {
    global $pagenow;
 
    $pages = array('edit.php');
    if (in_array($pagenow, $pages))
        wp_enqueue_style('style', get_template_directory_uri('template_url').'/assets/css/custom-admin.css');
}
add_action( 'admin_print_styles', 'services_print_styles' ); 
 
function services_save_order() {
    global $wpdb;
 
    $order = explode(',', $_POST['order']);
    $counter = 0;
 
    foreach ($order as $post_id) {
        $wpdb->update($wpdb->posts, array( 'menu_order' => $counter ), array( 'ID' => $post_id) );
        $counter++;
    }
    die(1);
}
add_action('wp_ajax_post_sort', 'services_save_order');

?>