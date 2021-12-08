<?php
/**
 * Plugin Name: Facebook Page Plugin
 * Description: Facebook Page Plugin
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
