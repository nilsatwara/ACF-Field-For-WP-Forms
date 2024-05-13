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
		 * @param array $settings the settings.
		 */
		function __construct($settings)
		{
			$this->name = 'acf_wp_forms';
			$this->label = __('WPForms', 'acf-field-for-wp-forms');
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
			$selected_values = !empty($field['value']) ? $field['value'] : array(); // Get the selected values
			$formatData = implode(',', $selected_values);
			$all_wp_forms = wpforms()->form->get();
			?>
			<select name="<?php echo esc_attr($field['name']); ?>[]" class="fstdropdown-select" searchdisable="false">
				<option value="0"><?php echo __('Select form', 'acf-field-for-wp-forms'); ?></option>
				<?php
				foreach ($all_wp_forms as $form) {
				?>
					<option value='<?php echo esc_attr($form->ID); ?>' <?php selected(in_array($form->ID, explode(',', $formatData))); ?>><?php echo esc_html($form->post_title); ?></option>
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
		function load_value($value, $post_id, $field)
		{
			if (!is_admin()) {
				// Get the selected form IDs from the ACF field
				$selected_form_ids = !empty($value) ? $value : array();

				if (!empty($selected_form_ids)) {
					// Convert array of IDs to string
					$shortcode_content = '';
					foreach ($selected_form_ids as $form_id) {
						$shortcode_content .= '[wpforms id="' . $form_id . '"]';
					}

					// Display the selected WPForms using shortcode
					if (is_string($shortcode_content)) {
						echo do_shortcode($shortcode_content);
					} else {
						echo 'Invalid shortcode content.';
					}
				} else {
					echo 'No WPForms selected.';
				}
			} else {
				return $value;
			}
		}
	}
	new ACF_Field_For_WP_Forms_Settings($this->settings);
}
