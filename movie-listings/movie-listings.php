<?php
/**
 * Plugin Name: Movie Listining
 * Description: Movie Listining
 * Version: 1.0
 * Author: Ahmed Herhesh
 */

if(!defined('ABSPATH')){
    exit;
}

// Load Scripts
$path = __DIR__ . '/inc';
$admin_files = [
    // 'movie-listings-cpt.php',
    'movie-listings-fields.php',
    'movie-listings-reorder.php',
    'movie-listings-settings.php',
];
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
