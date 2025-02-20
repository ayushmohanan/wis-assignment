<?php
/**
 * Plugin Name: wp-cpt
 * Plugin URI : #
 * Description: Plugin to register a custom post type.
 * Version: 0.1
 * Author: Ayush Mohanan
 * Author URI : #
 * License: GPL2
 */
 #improve secutiry to prevent php file direct access
if (!defined('ABSPATH')) {
    exit;
}
# define constants
define('CUSTOM_BOOKS_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('CUSTOM_BOOKS_PLUGIN_URL', plugin_dir_url(__FILE__));
#including fles
require_once CUSTOM_BOOKS_PLUGIN_PATH . 'includes/cls-wp-cpt.php';
require_once CUSTOM_BOOKS_PLUGIN_PATH . 'includes/cls-wp-cpt-activation.php';
#initialize clss
if (class_exists('CPT_Books')) {
    new CPT_Books();
}
#Register hooks
register_activation_hook(__FILE__, ['CPT_Activation', 'activate']);
register_deactivation_hook(__FILE__, ['CPT_Activation', 'deactivate']);
