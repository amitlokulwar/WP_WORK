<?php 
require_once(TEMPLATEPATH . '/includes/functions/sidebars.php'); 
?>
<?php
 

//Add support for WordPress 3.0's custom menus
add_action( 'init', 'register_my_menu' );
 
//Register area for custom menu
function register_my_menu() {
    register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
	 register_nav_menu( 'footer-menu', __( 'Footer Menu' ) );
}
?>
<?php
// Enable post thumbnails
add_theme_support('post-thumbnails');
set_post_thumbnail_size(520, 250, true);
?>
<?php
//Code for custom background support
add_custom_background();
//Enable post and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );
//Enable multisite feature (WordPress 3.0)
define('WP_ALLOW_MULTISITE', true);

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'THEMENAME' ),
) );

?>
<?php
 
// get all of the images attached to the current post
function nivo_get_images($size = 'large', $limit = '0', $offset = '0') {
global $post;
 
$images = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
 
if ($images) {
 
$num_of_images = count($images);
 
if ($offset > 0) : $start = $offset--; else : $start = 0; endif;
if ($limit > 0) : $stop = $limit+$start; else : $stop = $num_of_images; endif;
 
$i = 0;
foreach ($images as $image) {
if ($start <= $i and $i < $stop) {
$img_title = $image->post_title;   // title.
$img_description = $image->post_content; // description.
$img_caption = $image->post_excerpt; // caption.
$img_url = wp_get_attachment_url($image->ID); // url of the full size image.
$preview_array = image_downsize( $image->ID, $size );
$img_preview = $preview_array[0]; // thumbnail or medium image to use for preview.
 
///////////////////////////////////////////////////////////
// This is where you'd create your custom image/link/whatever tag using the variables above.
// This is an example of a basic image tag using this method.
?>
 
<img src="<?php echo $img_preview; ?>" alt="<?php echo $img_caption; ?>" />
 
<?php
// End custom image tag. Do not edit below here.
///////////////////////////////////////////////////////////
 
}
$i++;
}
 
}
}

function cptui_register_my_cpts() {

	/**
	 * Post Type: Services.
	 */

	$labels = [
		"name" => __( "Services", "custom-post-type-ui" ),
		"singular_name" => __( "Service", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Services", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "services", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
	];

	register_post_type( "services", $args );
	
		/**
	 * Post Type: Slider.
	 */

	$labels = array(
		"name" => __( "Slider", "" ),
		"singular_name" => __( "Slider", "" ),
		"menu_name" => __( "Slider", "" ),
		"all_items" => __( "All Slides", "" ),
	);

	$args = array(
		"label" => __( "Slider", "" ),
		"labels" => $labels,
		"description" => "All sliders",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "slider", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail", "custom-fields" ),
	);

	register_post_type( "slider", $args );
	
	/**
	 * Post Type: Testimonials.
	 */

	$labels = array(
		"name" => __( "Testimonials", "" ),
		"singular_name" => __( "Testimonial", "" ),
		"menu_name" => __( "Testimonials", "" ),
		"all_items" => __( "All Testimonials", "" ),
	);

	$args = array(
		"label" => __( "Testimonials", "" ),
		"labels" => $labels,
		"description" => "All Testimonials",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "testimonials", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail", "excerpt", "custom-fields" ),
	);

	register_post_type( "testimonials", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

function cptui_register_my_cpts_projects() {

	/**
	 * Post Type: Projects.
	 */

	$labels = [
		"name" => __( "Projects", "custom-post-type-ui" ),
		"singular_name" => __( "Project", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Projects", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "projects", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields" ],
		"taxonomies" => [ "category", "post_tag" ],
	];

	register_post_type( "projects", $args );
}

add_action( 'init', 'cptui_register_my_cpts_projects' );

function cptui_register_my_cpts_technologies() {

	/**
	 * Post Type: Technology.
	 */

	$labels = [
		"name" => __( "Technology", "custom-post-type-ui" ),
		"singular_name" => __( "Technologies", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Technology", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "technologies", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields" ],
		"taxonomies" => [ "category" ],
	];

	register_post_type( "technologies", $args );
}

add_action( 'init', 'cptui_register_my_cpts_technologies' );


//TN Disable WordPress Version from your website
function tn_disable_wp_version() {
return '';
}
add_filter ( 'the_generator' ,  'tn_disable_wp_version' );


// Defer Parsing of JavaScript in WordPress via functions.php file
// Learn more at https://technumero.com/defer-parsing-of-javascript/ 

function defer_parsing_js($url) {
//Add the files to exclude from defer. Add jquery.js by default
    $exclude_files = array('jquery.js');
//Bypass JS defer for logged in users
    if (!is_user_logged_in()) {
        if (false === strpos($url, '.js')) {
            return $url;
        }

        foreach ($exclude_files as $file) {
            if (strpos($url, $file)) {
                return $url;
            }
        }
    } else {
        return $url;
    }
    return "$url' defer='defer";

}
add_filter('clean_url', 'defer_parsing_js', 11, 1);

?>