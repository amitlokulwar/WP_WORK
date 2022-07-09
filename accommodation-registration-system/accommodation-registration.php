<?php ob_start();
/*
Plugin Name: Accommodation Registration System
Plugin URI: http://moderni.in
Description: This Plugin is for Registration , Accommodation Facility on Yourcheerworld.
Version: 1.0
Author: Amit k Lokulwar
Author URI: http://moderni.in
License: GPL2
 */


define('REGPATH', plugin_dir_path(__FILE__));
define('REGURL', plugins_url());
define('SITE', home_url());

//Initialize the flow
$book = new RegisterUser();






//include all the files
if(isset($book))
{
    register_activation_hook(__FILE__, array('RegisterUser','InitializeReg'));
    require_once( ABSPATH . WPINC . '/pluggable.php' ); 
    require_once('includes/allajax.php');
    require_once('includes/registration.php');
    require_once('includes/profile.php');
    require_once('includes/accommodation_sys.php');
    require_once('includes/guest_host_info.php');
    require_once('includes/hostProfile.php');
    require_once('includes/viewHost_details.php');
    require_once('includes/viewGuest_details.php');
    require_once('includes/guestregister.php');
    require_once('includes/searchListing.php');

    
    
}


class RegisterUser
{
    //check the wordpress updated version
    static $book_version = 1.0;
    static $table = 'registration';
    static $guest = 'guestreg';
    

    
    function __construct()
    {

        add_action('wp_enqueue_scripts', array(&$this,'RegScripts'));  
        
    }
    
    
    
    function InitializeReg()
    {
        //initiate the plugin information
        global $wp_version;
        if (version_compare($wp_version, "3.5", "<")) {
            deactivate_plugins(basename(__FILE__));
            wp_die("This Plugin Requires Wordpress Version 3.5 or Higher");
        }
        add_option("book_version", self::$book_version);
        self::InitializeDatabase();
        //self::InitializePages();
       
    }
    function menu()
    {
         global $current_user,$user_ID;
         get_currentuserinfo();

          
        
        echo '<div class="myaccount">';
           
       echo '</div>';
       
       

    }
    
    function adminmenu()
    {
         global $current_user,$user_ID;
         get_currentuserinfo();
//         if(is_user_logged_in()) { 
//          echo '<div class="myaccount">';
//          if($user_ID == 1){
//          echo '<div class="mymenu"><a href="'.site_url().'/profile.html">Profile</a></div>';
//          echo '<div class="mymenu"><a href="'.site_url().'/bookreview.html">Review</a></div>';
//          }
//       echo '</div>';
//    }
  }
    
    function RegScripts()
    {
        //wp_enqueue_script('jqueryPopup',plugins_url('/js/script.js', __FILE__));
        wp_enqueue_script('jqueryUIhome',plugins_url('/js/jquery-ui-1.10.3.custom.min.js', __FILE__));
        wp_enqueue_script('plugincustom',plugins_url('/js/custom.js', __FILE__));
        
        wp_enqueue_style('xyz',plugins_url('/css/style.css', __FILE__));
//        wp_enqueue_style('ratingCss',plugins_url('/include/css/rating.css', __FILE__));
//        wp_enqueue_style('jUI',plugins_url('/include/css/jquery-ui.css', __FILE__));
    }
   
    
    
    
    function InitializeDatabase()
    {
        global $wpdb;
        $tableName = $wpdb->prefix . self::$table;
        $tableGuest = $wpdb->prefix . self::$guest;
        
        $sql = "CREATE TABLE " . $tableName . " (
         `id` int(11) NOT NULL AUTO_INCREMENT,
         `membership` varchar(500) NOT NULL,
         `priceForPlan` varchar(100) NOT NULL,
         `first_name2` varchar(500) NOT NULL,
         `username` varchar(500) NOT NULL,
         `first_name` varchar(500) NOT NULL,
         `last_name` varchar(500) NOT NULL,
         `gender` varchar(50) NOT NULL,
         `BirthMonth` varchar(100) NOT NULL,
         `BirthDay` varchar(100) NOT NULL,
         `BirthYear` varchar(200) NOT NULL,
         `country` varchar(500) NOT NULL,
         `state` varchar(500) NOT NULL,
         `city` varchar(500) NOT NULL,
         `mobile` varchar(13) NOT NULL,
         `phone` varchar(13) NOT NULL,
         `email` varchar(500) NOT NULL,
         `email2` varchar(500) NOT NULL,
         `password` varchar(500) NOT NULL,
         `password2` varchar(500) NOT NULL,
         `altmail` varchar(500) NOT NULL,
         `question1` text NOT NULL,
         `a1` text NOT NULL,
         `question2` text NOT NULL,
         `a2` text NOT NULL,
        `tnc` int(11) NOT NULL,
        UNIQUE KEY `id` (`id`)
        );";
        
        $sqlGuset = "CREATE TABLE " . $tableGuest . " (
         `id` int(11) NOT NULL AUTO_INCREMENT,
          `guestid` int(11) NOT NULL ,
          `country` varchar(1000) NOT NULL,
          `state` varchar(1000) NOT NULL,
          `city` varchar(1000) NOT NULL,
          `arrival` varchar(1000) NOT NULL,
          `departure` varchar(1000) NOT NULL,
          `ppl` int(11) NOT NULL ,
          `price` varchar(1000) NOT NULL,
          `shortDes` text NOT NULL,
           UNIQUE KEY `id` (`id`)
        );";
        
        
        
      //  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      //  dbDelta($sql);
      //  dbDelta($sqlGuset);
        
    }     
    
    function InitializePages()
    {
        global $wpdb;
        $the_page_title = 'Whatever You Want';
        $the_page_name = 'whatever-you-want';
        $the_page = get_page_by_title( $the_page_title );
        if ( ! $the_page ) {

        // Create post object
        $_p = array();
        $_p['post_title'] = $the_page_title;
        $_p['post_content'] = "This text may be overridden by the plugin. You shouldn't edit it.";
        $_p['post_status'] = 'publish';
        $_p['post_type'] = 'page';
        $_p['comment_status'] = 'closed';
        $_p['ping_status'] = 'closed';
        $_p['post_category'] = array(1); // the default 'Uncatrgorised'

        // Insert the post into the database
        $the_page_id = wp_insert_post( $_p );

        }
    }
    
    
            
            
}
//Add login/logout link to naviagation menu
function add_login_out_item_to_menu( $items, $args ){

	//change theme location with your them location name
	if( is_admin() ||  $args->theme_location != 'primary' )
		return $items; 

	$redirect = ( is_home() ) ? false : get_permalink();
	if( is_user_logged_in( ) )
		$link = '<a href="' . wp_logout_url( $redirect ) . '" title="' .  __( 'Logout' ) .'">' . __( 'Logout' ) . '</a>';


	return $items.= '<li id="log-in-out-link" class="menu-item menu-type-link">'. $link . '</li>';
}add_filter( 'wp_nav_menu_items', 'add_login_out_item_to_menu', 50, 2 );
