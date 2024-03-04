<?php

/**
 * Class for ACF Field support.
 *
 * @package WordPress
 */

// If check class exists.
if (!class_exists('ACF_Field_For_WP_Forms')) {

	/**
	 * Declare class.
	 */
	class ACF_Field_For_WP_Forms
	{

		/**
		 * ACF Settings.
		 *
		 * @var settings
		 */
		var $settings;

		/**
		 * Admin notice message.
		 *
		 * @var message
		 */
		var $message;

		/**
		 * Calling construct.
		 */
		public function __construct()
		{
			// Setting.
			$this->settings = array(
				'version' => '1.0',
				'url' => plugin_dir_url(__FILE__),
				'path' => plugin_dir_path(__FILE__),
			);
			echo $this->message;
			// ACF plugin error message.
			$this->message = __('<b>"%s"</b> needs <b style="color:red";>"%s"</b> to run. Please download and activate it', 'acf-field-for-wp-forms');
			// Admin notice.
			add_action('admin_notices', array($this, 'acf_wp_forms_check_acf_is_activate'));
			// Plugin meta row.
			
			// If check required plugin working OR not.
			if (!class_exists('acf') || !defined('WPFORMS_VERSION')) {
				return;
			}
			// Include WP Forms field type in ACF Plugin
			add_action('acf/include_field_types', array($this, 'acf_wp_forms_include_fields'));

			add_filter('acf_wp_forms_object', array($this,'get_acf_wp_forms_object'));

		}


		/**
		 * ACF5 include field.
		 *
		 * @param int $version Plugin version.
		 */
		public function acf_wp_forms_include_fields($version = '1.8.7.2')
		{
			require_once plugin_dir_path(__FILE__) . 'acf-fields/acf-wp-forms.php';
		}

		/**
		 * If check ACF plugin activate or not.
		 */
		public function acf_wp_forms_check_acf_is_activate()
		{
			if (!class_exists('acf')) {
				echo '<div class="notice notice-error is-dismissible"><p>' . wp_sprintf($this->message, 'ACF Field For WP Forms', 'Advanced Custom Fields') . '</p></div>';
			} else if (!defined('WPFORMS_VERSION')) {
				echo '<div class="notice notice-error is-dismissible"><p>' . wp_sprintf($this->message, 'ACF Field For WP Forms', 'Contact Form 7') . '</p></div>';
			}
		}

		function get_acf_wp_forms_object() {
			return true;
		}
	}
}
