<?php

/**
 * ACF Field WP Forms Settings
 *
 * @package WordPress
 * @author Nilesh Kanzariya <https://github.com/nilsatwara>
 */

// If check class exists or not.
if (!class_exists('ACF_Field_For_WP_Forms_Settings')) {

	/**
	 * Declare class and extends to acf_field.
	 */
	class ACF_Field_For_WP_Forms_Settings extends acf_field
	{

		/**
		 * Class construct.
		 *
		 * @param array $settings  The settings.
		 */
		function __construct($settings)
		{
			$this->name = 'acf_wp_forms';
			$this->label = __('WP Forms', 'acf-field-for-wp-forms');
			$this->category = 'basic';
			$this->settings = $settings;
			parent::__construct();
		}

		/**
		 * Render acf fields.
		 *
		 * @param array $field  The field.
		 */

		function render_field($field)
		{
			$all_wp_forms = wpforms()->form->get();

?>
			<select name="<?php echo esc_attr($field['name']); ?>" value="<?php echo esc_attr($field['value']); ?>">
				<option value="0"><?php echo __('Select form', 'acf-field-for-wp-forms'); ?></option>
				<?php
				foreach ($all_wp_forms as $form) {
				?>
					<option value='<?php echo esc_attr($form->ID); ?>' <?php selected($field['value'], $form->ID); ?>><?php echo esc_html($form->post_title); ?></option>
				<?php
				}
				?>
			</select>
		<?php
		}


		/**
		 * Loads a value.
		 *
		 * @param object $value    The value.
		 * @param int    $post_id  The post identifier.
		 * @param string $field    The field.
		 *
		 * @return object
		 */
		function load_value($value, $post_id, $field) {
			if (!is_admin()) {
				$args = array(
					'post_type'      => 'wpforms',
					'post_status'    => 'publish',
					'posts_per_page' => -1,
				);
		
				// Query WPForms posts
				$wp_forms_query = new WP_Query($args);
		
				// Check if WPForms posts are found
				if ($wp_forms_query->have_posts()) {
					
					while ($wp_forms_query->have_posts()) {
						$wp_forms_query->the_post();
						echo $wp_forms_query->get_the_ID();
						// Display WPForms using shortcode
						echo do_shortcode('[wpforms id="' . get_the_ID() . '"]');
					}
					// Restore original post data
					wp_reset_postdata();
				} else {
					echo 'No WPForms found.';
				}
			} else {
				return $value;
			}
		}
		
	}
	new ACF_Field_For_WP_Forms_Settings($this->settings);
}
