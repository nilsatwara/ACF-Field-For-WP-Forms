<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

/**
 * Scripts Class
 *
 * Handles adding search forms functionality where acf wp forms field render.
 *
 * @package ACF Field For WPForms
 * @since 1.0.0
 */

function ACF_Field_For_WPForms_admin_scripts()
{
    wp_enqueue_script('fstdropdown', plugin_dir_url(__FILE__) . '/assets/js/fstdropdown.js', array('jquery'), '', true);
    wp_enqueue_script('fstdropdown.min', plugin_dir_url(__FILE__) . '/assets/js/fstdropdown.min.js', array('jquery'), '', true);


    wp_enqueue_style('fstdropdown_select', plugin_dir_url(__FILE__) . '/assets/css/fstdropdown.css', array(), '');
    wp_enqueue_style('fstdropdown.min_select', plugin_dir_url(__FILE__) . '/assets/css/fstdropdown.min.css', array(), '');
}

add_action('admin_enqueue_scripts', 'ACF_Field_For_WPForms_admin_scripts');
