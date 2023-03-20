<?php 

defined( 'ABSPATH' ) || exit;

final class WebFxAssets { 

    const HANDLE_FRONTEND_SCRIPT = 'webfx_popup_notification';

    private static $instance = null;

	public static function initialize() {
		if ( ! ( self::$instance instanceof WebFxAssets ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

    public function __construct() {
      self::init_hooks();
    }
    
    public function init_hooks() {
        add_action( 'wp_enqueue_scripts', [ $this, 'register_frontend_scripts' ] );
    }

    public function register_frontend_scripts() {
        wp_enqueue_script(
			self::HANDLE_FRONTEND_SCRIPT,
			WEBFX_POPUP_NOTIFICATION_PLUGIN_ASS_URL . '/js/script.js',
			[ 'jquery' ],
			filemtime( WEBFX_POPUP_NOTIFICATION_FILE . 'assets/js/script.js' ),
			true
		);

        wp_enqueue_style(
            self::HANDLE_FRONTEND_SCRIPT,
            WEBFX_POPUP_NOTIFICATION_PLUGIN_ASS_URL . '/css/style.css',
            null
        );
    }

}

WebFxAssets::initialize();