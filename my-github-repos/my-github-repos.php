<?php
/**
 * Plugin Name: My Github Repos
 * Description: My Github Repos
 * Version: 1.0
 * Author: Ahmed Herhesh
 */

if(!defined('ABSPATH')){
    exit;
}

// Load Scripts
$path = __DIR__ . '/inc';

foreach (scandir($path) as $key => $file) {
    if ($key > 1) {
        require_once "$path/$file";
    }
}
