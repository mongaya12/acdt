<?php 

defined( 'ABSPATH' ) || exit;

final class WebFxFrontEnd { 

   private static $instance = null;

	public static function initialize() {
		if ( ! ( self::$instance instanceof WebFxFrontEnd ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

    public function __construct() {
      self::init_hooks();
    }
    
    public function init_hooks() {
      add_action('wp_footer', [ $this, 'popup_context' ] );
    }

    public function popup_context() {
        $status     = get_field('notification_status', 'option');
        $content    = get_field('notification_content', 'option');

        $bg_color       = get_field('notification_background_color', 'option');
        $text_color     = get_field('notification_text_color', 'option');

        include_once WEBFX_POPUP_NOTIFICATION_FILE . '/inc/template/content-popup.php';
    }

}

WebFxFrontEnd::initialize();