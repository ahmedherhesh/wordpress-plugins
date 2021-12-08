<?php
// add scripts

function herhesh_sl_add_scripts(){
    wp_enqueue_style('herhesh_sl_main_style',plugins_url() . '/social-links/assets/css/style.css');
    wp_enqueue_script('herhesh_sl_main_script',plugins_url() . '/social-links/assets/js/main.js');
}
add_action('wp_enqueue_scripts','herhesh_sl_add_scripts');