<?php

require_once "functions/functions-patrial.php";
require_once "functions/article-posts.php";
require_once "functions/company-posts.php";
require_once "functions/interview-posts.php";
require_once "functions/advertising-posts.php";
require_once "functions/sector-fields.php";
require_once "functions/search-vars.php";
require_once "functions/function-urls.php";
require_once "functions/functions-reports.php";
require_once "functions/functions-load-more.php";
// function theme_dir() {
// 	return '/wp-content/themes/fdi';
// }

function custom_rewrite_tag()
{
    add_rewrite_tag('%category_name%', '([^&]+)');
}

add_action('init', 'custom_rewrite_tag', 10, 0);

add_theme_support('post-thumbnails');


add_action('wp_enqueue_scripts', 'my_scripts_method');
function my_scripts_method()
{

    wp_deregister_script('jquery-core');
    wp_register_script('jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
    wp_enqueue_script('jquery');
}

function fdispotlight_scripts()
{
    wp_enqueue_style('bootstrap-stylesheet', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('select2-css', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css');
    wp_register_style('main-css', get_template_directory_uri() . '/assets/css/main.css');
    wp_enqueue_style('main-css');
    wp_register_style('animate-css', get_template_directory_uri() . '/assets/css/animate.css');
    wp_enqueue_style('animate-css');
    wp_enqueue_style('fdi-Merriweather-font', 'https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900');
    wp_register_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js', array('jquery'), null, true);
    wp_enqueue_script('select2');
    wp_register_script('fdi-bootstrap-js', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), null, true);
    wp_enqueue_script('fdi-bootstrap-js');

    wp_register_script('wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), null, true);
    wp_enqueue_script('wow');
    wp_register_script('fdi-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), null, true);
    wp_enqueue_script('fdi-scripts');
    wp_enqueue_script('custom-js', trailingslashit(get_template_directory_uri()) . 'assets/js/' . 'main.js', array('jquery'), '1.0', true);
    wp_enqueue_script('fontawesome-js', 'https://use.fontawesome.com/44c77514a2.js', '4.7.0', true);
    wp_enqueue_script('html5shiv', 'https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js');
    wp_script_add_data('html5shiv', 'conditional', 'lt IE 9');
    wp_enqueue_script('respond', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js');
    wp_script_add_data('respond', 'conditional', 'lt IE 9');


}

add_action('wp_enqueue_scripts', 'fdispotlight_scripts');


#function components_dir()
#{
#    return theme_dir().'/components';
#}

################################################
#
#  Articles Custom Post type
#
################################################


function article()
{
    // global $customSlug;
    $labels = array(
        'name' => _x('Articles', 'Post Type General Name', 'FDI-2'),
        'singular_name' => _x('Articles', 'Post Type Singular Name', 'FDI-2'),
        'menu_name' => __('Articles', 'FDI-2'),
        'name_admin_bar' => __('Articles', 'FDI-2'),
        'archives' => __('Item Archives', 'FDI-2'),
        'attributes' => __('Item Attributes', 'FDI-2'),
        'parent_item_colon' => __('Parent Item:', 'FDI-2'),
        'all_items' => __('All Items', 'FDI-2'),
        'add_new_item' => __('Add New Item', 'FDI-2'),
        'add_new' => __('Add New', 'FDI-2'),
        'new_item' => __('New Item', 'FDI-2'),
        'edit_item' => __('Edit Item', 'FDI-2'),
        'update_item' => __('Update Item', 'FDI-2'),
        'view_item' => __('View Item', 'FDI-2'),
        'view_items' => __('View Items', 'FDI-2'),
        'search_items' => __('Search Item', 'FDI-2'),
        'not_found' => __('Not found', 'FDI-2'),
        'not_found_in_trash' => __('Not found in Trash', 'FDI-2'),
        'featured_image' => __('Featured Image', 'FDI-2'),
        'set_featured_image' => __('Set featured image', 'FDI-2'),
        'remove_featured_image' => __('Remove featured image', 'FDI-2'),
        'use_featured_image' => __('Use as featured image', 'FDI-2'),
        'insert_into_item' => __('Insert into item', 'FDI-2'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'FDI-2'),
        'items_list' => __('Items list', 'FDI-2'),
        'items_list_navigation' => __('Items list navigation', 'FDI-2'),
        'filter_items_list' => __('Filter items list', 'FDI-2'),
    );
    $args = array(
        'label' => __('article', 'FDI-2'),
        'description' => 'Custom post type for article',
        'labels' => $labels,
        'supports' => array('title', 'thumbnail', 'excerpt', 'page-attributes'),
        'taxonomies' => array('post_tag', 'category'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-format-aside',
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    register_post_type('article', $args);

}

add_action('init', 'article', 0);


################################################
#
#  Companies Custom Post type
#
################################################


function company()
{

    $labels = array(
        'name' => 'Companies',
        'singular_name' => 'Company',
        'menu_name' => 'Companies',
        'name_admin_bar' => 'Company',
        'parent_item_colon' => 'Parent company:',
        'all_items' => 'All Companies',
        'add_new_item' => 'Add New Company',
        'add_new' => 'Add New Company',
        'new_item' => 'New Company',
        'edit_item' => 'Edit Company',
        'update_item' => 'Update Company',
        'view_item' => 'View Company',
        'search_items' => 'Search Company',
        'not_found' => 'Company not found',
        'not_found_in_trash' => 'Company not found in trash',
        'items_list' => 'Company list',
        'items_list_navigation' => 'Company list navigation',
        'filter_items_list' => 'Filter company',
    );
    $args = array(
        'label' => 'company',
        'description' => 'Custom post type for company',
        'labels' => $labels,
        'supports' => array('title', 'thumbnail', 'excerpt'),
        'taxonomies' => array('post_tag', 'category'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-building',
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    register_post_type('company', $args);

}

add_action('init', 'company', 0);


################################################
#
#  Interviews Custom Post type
#
################################################


function interview()
{

    $labels = array(
        'name' => 'Interviews',
        'singular_name' => 'Interview',
        'menu_name' => 'Interviews',
        'name_admin_bar' => 'Interview',
        'parent_item_colon' => 'Parent interview:',
        'all_items' => 'All Interviews',
        'add_new_item' => 'Add New Interview',
        'add_new' => 'Add New Interview',
        'new_item' => 'New Interview',
        'edit_item' => 'Edit Interview',
        'update_item' => 'Update Interview',
        'view_item' => 'View Interview',
        'search_items' => 'Search Interview',
        'not_found' => 'Interview not found',
        'not_found_in_trash' => 'Interview not found in trash',
        'items_list' => 'Interview List',
        'items_list_navigation' => 'Interview list navigation',
        'filter_items_list' => 'Filter Interview',
    );
    $args = array(
        'label' => 'interview',
        'description' => 'Custom post type for interview',
        'labels' => $labels,
        'supports' => array('title', 'thumbnail', 'excerpt'),
        'taxonomies' => array('post_tag', 'category'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-businessman',
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    register_post_type('interview', $args);

}

add_action('init', 'interview', 0);


//* --== Register Custom Taxonomy Sector ==-- */
function custom_sector()
{

    $labels = array(
        'name' => _x('Sectors', 'Sector General Name', 'FDI-2'),
        'singular_name' => _x('Sector', 'Sector Singular Name', 'FDI-2'),
        'menu_name' => __('Sectors', 'FDI-2'),
        'all_items' => __('All Items', 'FDI-2'),
        'parent_item' => __('Parent Item', 'FDI-2'),
        'parent_item_colon' => __('Parent Item:', 'FDI-2'),
        'new_item_name' => __('New Item Name', 'FDI-2'),
        'add_new_item' => __('Add New Item', 'FDI-2'),
        'edit_item' => __('Edit Item', 'FDI-2'),
        'update_item' => __('Update Item', 'FDI-2'),
        'view_item' => __('View Item', 'FDI-2'),
        'separate_items_with_commas' => __('Separate items with commas', 'text_domain'),
        'add_or_remove_items' => __('Add or remove items', 'FDI-2'),
        'choose_from_most_used' => __('Choose from the most used', 'text_domain'),
        'popular_items' => __('Popular Items', 'FDI-2'),
        'search_items' => __('Search Items', 'FDI-2'),
        'not_found' => __('Not Found', 'FDI-2'),
        'no_terms' => __('No items', 'FDI-2'),
        'items_list' => __('Items list', 'FDI-2'),
        'items_list_navigation' => __('Items list navigation', 'FDI-2'),
    );
    $rewrite = array(
        'slug' => 'sectors',
        'with_front' => true,
        'hierarchical' => true,
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'rewrite' => $rewrite,
    );
    register_taxonomy('sector', array('post', 'interview', 'company', 'article', 'advertising'), $args);

}

add_action('init', 'custom_sector', 0);

//* --== Register Custom Post Type ==-- */
function advertising_post_type()
{

    $labels = array(
        'name' => _x('Advertising', 'Post Type General Name', 'FDI-2'),
        'singular_name' => _x('Advertising', 'Post Type Singular Name', 'FDI-2'),
        'menu_name' => __('Advertisings', 'FDI-2'),
        'name_admin_bar' => __('Advertising', 'FDI-2'),
        'archives' => __('Item Archives', 'FDI-2'),
        'attributes' => __('Item Attributes', 'FDI-2'),
        'parent_item_colon' => __('Parent Item:', 'FDI-2'),
        'all_items' => __('All Items', 'FDI-2'),
        'add_new_item' => __('Add New Item', 'FDI-2'),
        'add_new' => __('Add New', 'FDI-2'),
        'new_item' => __('New Item', 'FDI-2'),
        'edit_item' => __('Edit Item', 'FDI-2'),
        'update_item' => __('Update Item', 'FDI-2'),
        'view_item' => __('View Item', 'FDI-2'),
        'view_items' => __('View Items', 'FDI-2'),
        'search_items' => __('Search Item', 'FDI-2'),
        'not_found' => __('Not found', 'FDI-2'),
        'not_found_in_trash' => __('Not found in Trash', 'FDI-2'),
        'featured_image' => __('Featured Image', 'FDI-2'),
        'set_featured_image' => __('Set featured image', 'FDI-2'),
        'remove_featured_image' => __('Remove featured image', 'FDI-2'),
        'use_featured_image' => __('Use as featured image', 'FDI-2'),
        'insert_into_item' => __('Insert into item', 'FDI-2'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'FDI-2'),
        'items_list' => __('Items list', 'FDI-2'),
        'items_list_navigation' => __('Items list navigation', 'FDI-2'),
        'filter_items_list' => __('Filter items list', 'FDI-2'),
    );

    $args = array(
        'label' => __('Advertising', 'FDI-2'),
        'description' => 'Custom post type for advertising',
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'),
        'taxonomies' => array('post_tag', 'category'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-megaphone',
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('advertising', $args);

}

add_action('init', 'advertising_post_type', 0);


################################################
#
#  Menu Walker
#
################################################

// add_action('init', 'start_session', 1);

// function start_session() {
//     if(!session_id()) {
//         session_start();
//     }
// }

// class description_walker extends Walker_Nav_Menu {
//     function start_el(&$output, $item, $depth, $args) {
//         global $wp_query;
//         $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

//         $class_names = $value = '';

//         $classes = empty( $item->classes ) ? array() : (array) $item->classes;

//         $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
//         $class_names = ' class="'. esc_attr( $class_names ) . '"';

//         $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

//         $segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
//         if($segments[0] == ''){
//             $selectedPlace = 'sadc';
//             $topic = 'invest';
//         }
//         else{
//               if(strstr($segments[0], '-')){
//                 if($segments[0] == 'south-africa'){
//                     $selectedPlace = 'south-africa';
//                 }else{
//                     $selectedPlace = substr($segments[0], 0,strrpos($segments[0], '-'));
//                     $gettopic = explode("-", $selectedPlace);
//                     $topic = $gettopic[0];
//                 }
//               }else{
//                 $selectedPlace = $segments[0];
//                 $topic = 'highereducation';
//               }
//         }
//         $output_categories = array();
//         $categories=get_terms(['taxonomy' => 'article_catgory']);
//           foreach($categories as $category) {
//              $output_categories[] = $category->slug;
//         }
//         if( isset($selectedPlace) && in_array($selectedPlace, $output_categories) ){
//             $_SESSION['selectedPlace'] = $selectedPlace;
//         }

//         if(isset($_SESSION['selectedPlace']) && $_SESSION['selectedPlace'] != '' ){
//             $slug = $_SESSION['selectedPlace'];
//         }else{
//             $slug = 'sadc';
//         }

//         $editedhref = preg_replace('/[^A-Za-z0-9\-]/', '', $item->url);
//         if($_SERVER['SERVER_NAME'] == 'fdispotlight.local'){
//             $newhref = site_url() .'/'.$topic . '-'. $slug .'-'. $editedhref;
//         }else{
//             $newhref = site_url() .'/'.$topic . '-'. $slug .'-'. $editedhref;
//         }

//         $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
//         $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
//         $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
//         $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $newhref        ) .'"' : '';
//         $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

//         if($depth != 0) {
//             $description = $append = $prepend = "";
//         }

//         $item_output = $args->before;
//         $item_output .= '<a'. $attributes .'>';
//         $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
//         $item_output .= $description.$args->link_after;
//         $item_output .= '</a>';
//         $item_output .= $args->after;

//         $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
//     }
// }

function set_category_base($category_base)
{
    if ($category_base != get_option('category_base')) {
        update_option('category_base', 'sadc');
        $this->init();
    }
}

function get_person_position($post_id)
{
    $position = get_field('ceo_position', $post_id);

    $organisation = "";
    if (get_field('associated_company_text', $post_id)) {
        $organisation = get_field('associated_company_text', $post_id);
    } else {
        $company = get_field('company', $post_id);
        if ($company) {
            foreach ($company as $p) {
                $organisation = get_the_title($p->ID);
            }
        }
    }
    echo $position . " | " . $organisation;
}

################################################
#
#  option page
#
################################################

if (function_exists('acf_add_options_page')) {

    acf_add_options_page();

}

################################################
#
#  Menu
#
################################################
function register_menus()
{
    register_nav_menu("main_menu", "Main Menu");
    register_nav_menu("footer_menu", "Footer Menu");
    // register_nav_menu( "country_menu", "Country Menu" );
    register_nav_menu("menu_cpt", "Archive Menu");
}

add_action('after_setup_theme', 'register_menus');

add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);

function special_nav_class($classes, $item)
{
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active ';
    }

    return $classes;
}

################################################
#
#  Custom Logo
#
################################################

function theme_prefix_setup()
{
    add_theme_support('custom-logo');
}

add_action('after_setup_theme', 'theme_prefix_setup');

################################################
#
#  Custom Image Size
#
################################################


if (function_exists('add_image_size')) {
    add_image_size('icon_thumb', 100, 100);
    add_image_size('icon_big', 260, 260);
    add_image_size('photo_thumb', 150, 130);
    add_image_size('photo_medium', 235, 260);
    add_image_size('photo_big', 280, 375);
    add_image_size('sector_thumb', 350, 350, true);
    add_image_size('banner_thumb', 150, 130);
    add_image_size('banner_medium', 750, 260);
    add_image_size('banner_big', 1000, 375, true);
    add_image_size('_thumb', 9999, 130);
    add_image_size('_medium', 9999, 260);
    add_image_size('_big', 9999, 375);
    add_image_size('reports-background', 1000, 700);
    add_image_size('image400_500', 400, 500);
}


if (!function_exists('vt_resize')) {
    function vt_resize($attach_id = null, $img_url = null, $width, $height, $crop = false)
    {
        // this is an attachment, so we have the ID
        if ($attach_id) {
            $image_src = wp_get_attachment_image_src($attach_id, 'full');
            $file_path = get_attached_file($attach_id);
            // this is not an attachment, let's use the image url
        } else if ($img_url) {
            $file_path = parse_url($img_url);
            $file_path = $_SERVER['DOCUMENT_ROOT'] . $file_path['path'];
            // Look for Multisite Path
            if (file_exists($file_path) === false) {
                global $blog_id;
                $file_path = parse_url($img_url);
                if (preg_match("/files/", $file_path['path'])) {
                    $path = explode('/', $file_path['path']);
                    foreach ($path as $k => $v) {
                        if ($v == 'files') {
                            $path[$k - 1] = 'wp-content/blogs.dir/' . $blog_id;
                        }
                    }
                    $path = implode('/', $path);
                }
                $file_path = $_SERVER['DOCUMENT_ROOT'] . $path;
            }
            //$file_path = ltrim( $file_path['path'], '/' );
            //$file_path = rtrim( ABSPATH, '/' ).$file_path['path'];
            $orig_size = getimagesize($file_path);
            $image_src[0] = $img_url;
            $image_src[1] = $orig_size[0];
            $image_src[2] = $orig_size[1];
        }
        if (isset($file_path)) {
            $file_info = pathinfo($file_path);
            // check if file exists
            $base_file = $file_info['dirname'] . '/' . $file_info['filename'] . '.' . $file_info['extension'];
            if (!file_exists($base_file)) {
                return;
            }
            $extension = '.' . $file_info['extension'];
            // the image path without the extension
            $no_ext_path = $file_info['dirname'] . '/' . $file_info['filename'];
            $cropped_img_path = $no_ext_path . '-' . $width . 'x' . $height . $extension;
            // checking if the file size is larger than the target size
            // if it is smaller or the same size, stop right here and return
            if ($image_src[1] > $width) {
                // the file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
                if (file_exists($cropped_img_path)) {
                    $cropped_img_url = str_replace(basename($image_src[0]), basename($cropped_img_path), $image_src[0]);
                    $vt_image = array(
                        'url' => $cropped_img_url,
                        'width' => $width,
                        'height' => $height
                    );

                    return $vt_image;
                }
                // $crop = false or no height set
                if ($crop == false OR !$height) {
                    // calculate the size proportionaly
                    $proportional_size = wp_constrain_dimensions($image_src[1], $image_src[2], $width, $height);
                    $resized_img_path = $no_ext_path . '-' . $proportional_size[0] . 'x' . $proportional_size[1] . $extension;
                    // checking if the file already exists
                    if (file_exists($resized_img_path)) {
                        $resized_img_url = str_replace(basename($image_src[0]), basename($resized_img_path), $image_src[0]);
                        $vt_image = array(
                            'url' => $resized_img_url,
                            'width' => $proportional_size[0],
                            'height' => $proportional_size[1]
                        );

                        return $vt_image;
                    }
                }
                // check if image width is smaller than set width
                $img_size = getimagesize($file_path);
                if ($img_size[0] <= $width) {
                    $width = $img_size[0];
                }
                // Check if GD Library installed
                if (!function_exists('imagecreatetruecolor')) {
                    echo 'GD Library Error: imagecreatetruecolor does not exist - please contact your webhost and ask them to install the GD library';

                    return;
                }
                // no cache files - let's finally resize it
                // $new_img_path = image_resize( $file_path, $width, $height, $crop );
                $new_img_path = wp_get_image_editor($file_path);
                if (!is_wp_error($new_img_path)) {
                    $new_img_path->resize($width, $height, $crop);
                    $new_img_path->save($file_path);
                }
                $new_img_size = getimagesize($file_path);
//				print_r($new_img_path);
                $new_img = str_replace(basename($image_src[0]), basename($file_path), $image_src[0]);
                // resized output
                $vt_image = array(
                    'url' => $new_img,
                    'width' => $new_img_size[0],
                    'height' => $new_img_size[1]
                );

                return $vt_image;
            }
            // default output - without resizing
            $vt_image = array(
                'url' => $image_src[0],
                'width' => $width,
                'height' => $height
            );

            return $vt_image;
        }
    }
}

function redirect_404()
{
    global $wp_query;
    $wp_query->set_404();
    status_header(404);
    get_template_part(404);
    exit();
}

function get_cat_slug($cat_id)
{
    $cat_id = (int)$cat_id;
    $category = &get_category($cat_id);

    return $category->slug;
}

function uri_segment($n)
{
    $segments = explode('/', $_SERVER['REQUEST_URI']);
    if (array_key_exists($n, $segments)) {
        return $segments[$n];
    } else {
        return null;
    }
}

function register_field_video_block()
{

    if (function_exists('acf_add_local_field_group')):

        acf_add_local_field_group(array(
            'key' => 'video_block',
            'title' => 'Video block',
            'fields' => array(

                array(
                    'key' => 'background_video_file_1',
                    'label' => 'Background video (MP4)',
                    'name' => 'background_video_file_1',
                    'type' => 'file',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'url',
                    'library' => 'all',
                    'min_size' => '',
                    'max_size' => '',
                    'mime_types' => '',
                ),
                array(
                    'key' => 'background_video_file_2_2',
                    'label' => 'Background video (webm)',
                    'name' => 'background_video_file_2_2',
                    'type' => 'file',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'url',
                    'library' => 'all',
                    'min_size' => '',
                    'max_size' => '',
                    'mime_types' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'templates/country-template.php',
                    )
                ),
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'page',
                    )
                ),
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'article',
                    )
                ),
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'advertising',
                    )
                ),
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'templates/region-template.php',
                    )
                )
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'active' => 1,
            'description' => '',
        ));

    endif;
}

add_action('init', 'register_field_video_block');

function render_template_part($template, $params = [])
{
    ob_start();

    extract($params);
    include(locate_template('parts/' . $template . '.php'));

    if (isset($_SESSION['errors']))
        unset($_SESSION['errors']);

    return ob_get_clean();
}


/* --== Support  excerpt in page  ==-- */

add_action('init', 'page_excerpt');
function page_excerpt()
{
    add_post_type_support('page', 'excerpt');
}

class My_Walker_Nav_Menu extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu-" . $depth . "\">\n";
    }
}


// Advertising button on Wordpress-Editor

add_action('admin_head', 'advertisement_button');

function advertisement_button()
{
    global $typenow;
    // check access rights
    if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
        return;
    }
    // check the message type
    if (!in_array($typenow, array('post', 'page', 'article')))
        return;
    // checking is WYSIWYG included

    if (get_user_option('rich_editing') == 'true') {
        add_filter("mce_external_plugins", "custom_tinymce_plugin");
        add_filter('mce_buttons', 'register_advrt_button');
    }
}

function custom_tinymce_plugin($plugin_array)
{
    $plugin_array['advrt_button'] = get_template_directory_uri() . "/assets/js/custom-button.js";
    return $plugin_array;
}

function register_advrt_button($buttons)
{
    array_push($buttons, "advrt_button");
    return $buttons;
}

function advrt_butto_css()
{
    wp_enqueue_style('ex_first', get_template_directory_uri() . "/assets/css/button.css");
}

add_action('admin_enqueue_scripts', 'advrt_butto_css');


// Custom Sector Archive Title

add_filter('get_the_archive_title', function ($title) {

    if (is_tax()) {
        $tax = get_taxonomy(get_queried_object()->taxonomy);

        $title = sprintf(__(' %2$s %1$s'), $tax->labels->singular_name, single_term_title('', false));
    }
    return $title;
});
