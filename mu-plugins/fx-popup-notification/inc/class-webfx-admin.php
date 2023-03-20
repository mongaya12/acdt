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

final class WebFxAdmin { 

   private static $instance = null;

	public static function initialize() {
		if ( ! ( self::$instance instanceof WebFxAdmin ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

    public function __construct() {
      self::init_hooks();
    }
    
    public function init_hooks() {
      add_action( 'acf/init', [ $this, 'acf_init' ] );
    }

    public function acf_init() {
      self::acf_add_options_page();
      self::acf_add_local_field_group();
    }

    private function acf_add_options_page() {
        if( ! function_exists( 'acf_add_options_page' ) )
            return;

        acf_add_options_page(
            array(
                'page_title' => 'Notification Popup',
                'menu_title' => 'Notification Popup',
                'menu_slug'  => 'webfx-notification-popup',
                'capability' => 'edit_posts',
                    'redirect'   => false,
                    'icon_url'   => 'dashicons-schedule',
                )
        );
    }

    private function acf_add_local_field_group() {
        if( ! function_exists( 'acf_add_local_field_group' ) )
            return;

         acf_add_local_field_group(array(
            'key' => 'group_64105ea3135e7',
            'title' => 'Notification Popup',
            'fields' => array(
               array(
                  'key' => 'field_64105ea29b9df',
                  'label' => 'Notification Status',
                  'name' => 'notification_status',
                  'aria-label' => '',
                  'type' => 'button_group',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                     'width' => '',
                     'class' => '',
                     'id' => '',
                  ),
                  'choices' => array(
                     'off' => 'Off',
                     'live_mode' => 'Active',
                  ),
                  'default_value' => '',
                  'return_format' => 'value',
                  'allow_null' => 0,
                  'layout' => 'horizontal',
               ),
               array(
                  'key' => 'field_64105f242b500',
                  'label' => 'Content',
                  'name' => 'notification_content',
                  'aria-label' => '',
                  'type' => 'wysiwyg',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => array(
                     array(
                        array(
                           'field' => 'field_64105ea29b9df',
                           'operator' => '!=',
                           'value' => 'off',
                        ),
                     ),
                  ),
                  'wrapper' => array(
                     'width' => '',
                     'class' => '',
                     'id' => '',
                  ),
                  'default_value' => '',
                  'tabs' => 'all',
                  'toolbar' => 'full',
                  'media_upload' => 1,
                  'delay' => 0,
               ),
               array(
                  'key' => 'field_64105f572b501',
                  'label' => 'Background Color',
                  'name' => 'notification_background_color',
                  'aria-label' => '',
                  'type' => 'color_picker',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => array(
                     array(
                        array(
                           'field' => 'field_64105ea29b9df',
                           'operator' => '!=',
                           'value' => 'off',
                        ),
                     ),
                  ),
                  'wrapper' => array(
                     'width' => '50',
                     'class' => '',
                     'id' => '',
                  ),
                  'default_value' => '#e4b340',
                  'enable_opacity' => 0,
                  'return_format' => 'string',
               ),
               array(
                  'key' => 'field_64105f7d2b502',
                  'label' => 'Text Color',
                  'name' => 'notification_text_color',
                  'aria-label' => '',
                  'type' => 'color_picker',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => array(
                     array(
                        array(
                           'field' => 'field_64105ea29b9df',
                           'operator' => '!=',
                           'value' => 'off',
                        ),
                     ),
                  ),
                  'wrapper' => array(
                     'width' => '50',
                     'class' => '',
                     'id' => '',
                  ),
                  'default_value' => '#000',
                  'enable_opacity' => 0,
                  'return_format' => 'string',
               ),
            ),
            'location' => array(
               array(
                  array(
                     'param' => 'options_page',
                     'operator' => '==',
                     'value' => 'webfx-notification-popup',
                  ),
               ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
            'show_in_rest' => 0,
         ));
               
    }
}

WebFxAdmin::initialize();