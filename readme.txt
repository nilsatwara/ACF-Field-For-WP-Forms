=== ACF Field For WPForms ===
Contributors: Nilesh Kanzariya
Tags: acf, wpforms, advanced custom fields, WPform, forms
Requires at least: 4.4
Tested up to: 6.1
Stable tag: 1.6
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Adds a 'WPForms' field type for the Advanced Custom Fields WordPress plugin.

== Description ==

Adds a 'WPForms' field type for the Advanced Custom Fields WordPress plugin.

Field is returned as WPForms markup.


= Compatibility =

This ACF field type is compatible with :
* ACF 3
* ACF 4
* ACF 5

== Installation ==

1. Copy the `acf-field-for-wp-forms` folder into your `wp-content/plugins` folder.
2. Activate the Advanced Custom Fields: WPForms Field plugin via the plugins admin page.
3. Create a new field via ACF and select the WPforms.

== Frequently Asked Questions ==

= How to use =

This example shows how to get the value of field `field_name` from the current post.

`echo get_field( 'field_name' );`


This example shows how to get form (contact form 7) object.

`function get_acf_cf7_object() {
	return true;
}
add_filter( 'acf_cf7_object', 'get_acf_cf7_object' );`

= I have an idea for a great way to improve this plugin =

Great! I’d love to hear from you at <a href="mailto:support@krishaweb.com">support@krishaweb.com</a>

== Changelog ==

= 1.0 =
* Initial Release.