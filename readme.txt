=== ACF Field For WPForms ===
Contributors: Nilesh Kanzariya
Tags: acf, wpforms, advanced custom fields, WPform, forms
Requires at least: 4.4
Tested up to: 6.5
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

I will guide you through the process step by step:

1. Begin by ensuring that both WPForms or WPForms Lite and the ACF plugin, along with the ACF field for WPForms, are installed and activated.

2. Next, navigate to the ACF plugin and add a new field type called "WPForms". Configure the rules as follows: "Show this field group if page, post, post_type, options page, etc."

3. Now, choose the forms you want to display based on the rules set earlier in the ACF plugin. Finally, click on save.

Incorporate the following code into your template or custom page: <?php echo get_field('field_name');?>
4. Verify on the frontend that your form appears as expected.

== Changelog ==

= 1.0 =
* Initial Release.