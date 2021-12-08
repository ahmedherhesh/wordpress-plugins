<?php

/**
 * Plugin Name: Todo List
 * Description: Todo List
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
        if ($file == 'todo-list-cpt.php' || $file == 'todo-list-fields.php') {
            if (!is_admin()) {
                continue;
            }
            require_once "$path/$file";
        } else {
            require_once "$path/$file";
        }
    }
}
