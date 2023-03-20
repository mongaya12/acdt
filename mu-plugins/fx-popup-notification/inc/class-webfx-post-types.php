<?php 

/**
 * 	Plugin Name:	WebFX Popup Notification
 * 	Plugin URI: 	https://www.webfx.com
 * 	Description:	Add the "PopUp Notification" post type
 * 	Version: 		1.0.0
 * 	Author: 		The WebFX Team
 * 	Author URI: 	https://www.webfx.com
 * 	Text Domain: 	webfx
 */

defined( 'ABSPATH' ) || exit;

final class WebFxPopupNotificationPostType { 

    public const POST_TYPE = 'popup-notification';

    private function __construct() {}

    public static function initialize() {
        add_action( 'init', array( __CLASS__, 'init' ) );
    }

    public static function init() {
        self::register_post_type();
        
        /**
         *  Uncomment line below when creating taxonomy. 
         */
        // self::register_taxonomy(); 
    }

    private static function register_post_type() {
		$labels = array(
			'name'               => 'Popup Notification',
			'singular_name'      => 'Popup Notification',
			'menu_name'          => 'Popup Notifications',
			'name_admin_bar'     => 'Popup Notification',
			'parent_item_colon'  => 'Parent Popup Notification:',
			'all_items'          => 'All Popup Notifications',
			'add_new_item'       => 'Add New Popup Notification',
			'add_new'            => 'Add New',
			'new_item'           => 'New Popup Notification',
			'edit_item'          => 'Edit Popup Notification',
			'update_item'        => 'Update Popup Notification',
			'view_item'          => 'View Popup Notification',
			'view_items'         => 'View Popup Notification',
			'search_items'       => 'Search Popup Notification',
			'not_found'          => 'Not found',
			'not_found_in_trash' => 'Not found in Trash',
		);
		$args   = array(
			'label'         		=> 'Popup Notification',
			'labels'        		=> $labels,
			'public'        		=> true,
			'show_in_rest'  		=> true,
			'has_archive'			=> false,
			'exclude_from_search' 	=> true,
			'menu_position' 		=> 4,
			'menu_icon'     		=> 'dashicons-schedule',
			'supports'      		=> array( 'title', 'author', 'custom-fields' ),
			'rewrite'       		=> array(
				'with_front' 			=> false
			),
			'can_export'    		=> true,
		);
		register_post_type( self::POST_TYPE, $args );
    }

    private static function register_taxonomy() {}
}

// WebFxPopupNotificationPostType::initialize();