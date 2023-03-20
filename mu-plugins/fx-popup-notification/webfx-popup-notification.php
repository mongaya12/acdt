<?php 

/**
 *
 * Plugin Name:             WebFX PopUp Notification
 * Description:             Display the notification across the site and 
 *                          you can also exclude or include pages on which to display the popup notifications
 *
 * Version:             0.0.1
 * Requires PHP:        7.0
 * Requires at least:   5.0
 * Tested:              5.9
 *
 * Author:              WebFX
 * Author URI:          https://webfx.com
 * Plugin URI:          https://webfx.com
 * Text Domain:         webfx
 *
 */

defined( 'ABSPATH' ) || exit;

class WebFxPopupNotification {

    public static $instance = null;

    public static $hook_base = 'webfx_popup_notification';

    public $plugin_url;

    public $plugin_dir;

    public $plugin_assets_dir;

    public $plugin_assets_url;

    public $plugin_base_file;

    public $plugin_inc_dir;

    /**
	 * Singleton pattern
	 *
	 * Ensures only one instance of plugin is loaded or can be loaded
	 *
	 * @return  self
	 */

	public static function instance() {
		if ( ! ( self::$instance instanceof WebFxPopupNotification ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

    /**
	 * Kicks off plugin
	 *
	 * Should not be called publicly; instead, call instance()
	 *
	 */
	private function __construct() {
		$this->define_props();
		$this->load_includes();
	}

    /**
	 * Define base class properties
	 *
	 * @since   0.0.1
	 *
	 */
	private function define_props() {
		$this->plugin_base_file = __FILE__;
		$this->plugin_dir       = __DIR__;

		$this->plugin_inc_dir    = sprintf( '%s/inc', $this->plugin_dir );
		$this->plugin_assets_dir = sprintf( '%s/assets', $this->plugin_dir );

		$this->plugin_url        = untrailingslashit( plugin_dir_url( $this->plugin_base_file ) );
		$this->plugin_assets_url = sprintf( '%s/assets', $this->plugin_url );

		define( 'WEBFX_POPUP_NOTIFICATION_FILE', sprintf( '%s/', __DIR__ ) );

		define( 'WEBFX_POPUP_NOTIFICATION_PLUGIN_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );
		define( 'WEBFX_POPUP_NOTIFICATION_PLUGIN_ASS_URL', sprintf( '%s/assets', WEBFX_POPUP_NOTIFICATION_PLUGIN_URL ) );

	}

    /**
	 * Load include class files
	 *
	 * @since   0.0.1
	 *
	 */
	public function load_includes() {
		/**
		 * Load core classes as needed
		 */

		include_once $this->plugin_inc_dir . '/class-webfx-assets.php';

		include_once $this->plugin_inc_dir . '/class-webfx-front-end.php';

        if( is_admin() )
            include_once $this->plugin_inc_dir . '/class-webfx-admin.php';

		// include_once $this->plugin_inc_dir . '/class-webfx-post-types.php';

        

	}
}

add_action( 'plugins_loaded', 'webfx_popup_notification' );
function webfx_popup_notification() {
	return WebFxPopupNotification::instance();
}
