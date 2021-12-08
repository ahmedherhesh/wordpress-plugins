<?php
/**
 * Plugin Name: Facebook Footer Link
 * Description: Ads a facebook profile link to the end posts
 * Version: 1.0
 * Author: Ahmed herhesh
 */

if(!defined('ABSPATH')){
    exit;
}

// load Scripts
$herhesh_options = get_option('herhesh_settings');
require_once plugin_dir_path(__FILE__) . '/inc/facebook-footer-link-scripts.php';
require_once plugin_dir_path(__FILE__) . '/inc/facebook-footer-link-content.php';
if(is_admin()){
    require_once plugin_dir_path(__FILE__) . '/inc/facebook-footer-link-settings.php';
}
