<?php
/**
 * Plugin Name: Youtube Video Gallery
 * Description: Add a Youtube Video gallery to your website and you can control this in reading section
 * Version: 1.0
 * Author: Ahmed Herhesh
 */

if(!defined('ABSPATH')){
    exit;
}

// Load Scripts
$path = __DIR__ . '/inc';
$admin_files = ['youtube-video-gallery-cpt.php','youtube-video-gallery-settings.php','youtube-video-gallery-fields.php'];
foreach (scandir($path) as $key => $file) {
    if ($key > 1) {
        if (in_array($file,$admin_files)) {
            if (!is_admin()) {
                continue;
            }
            require_once "$path/$file";
        } else {
            require_once "$path/$file";
        }
    }
}

