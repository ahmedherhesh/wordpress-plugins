<?php

/**
 * Plugin Name: Newsletter Subscriber
 * Description: Newsletter Subscriber
 * Version: 1.0
 * Author: Ahmed Herhesh
 */

if (!defined('ABSPATH')) {
    exit;
}

// Load Scripts
$path = __DIR__ . '/inc';

foreach (scandir($path) as $key => $file) {
    if ($key > 1) {
        if ($file == 'newsletter-subscriber-mailer.php') continue;
        require_once "$path/$file";
    }
}
// function herhesh_sidebar()
// {
//     register_sidebar([
//         'name' => 'Sidebar',
//         'id' => 'sidebar1'
//     ]);
// }
// add_action('widgets_init', 'herhesh_sidebar');
// dynamic_sidebar('sidebar1');
