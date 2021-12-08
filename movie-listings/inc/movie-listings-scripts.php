<?php
//add admin scripts

function herhesh_ml_add_admin_scripts()
{
    wp_enqueue_style('herhesh_ml_jquery_ui_style', plugins_url() . '/movie-listings/assets/css/jquery-ui.min.css');
    wp_enqueue_style('herhesh_ml_main_style', plugins_url() . '/movie-listings/assets/css/style-admin.css');
    wp_enqueue_script('herhesh_ml_main_script', plugins_url() . '/movie-listings/assets/js/main.js',['jquery','jquery-ui-sortable']);
    wp_localize_script( 'herhesh_ml_script','HERHESH_ML_MOVIE_LISTING', ['token' => wp_create_nonce('herhesh-ml-token')]);
}
add_action('admin_init', 'herhesh_ml_add_admin_scripts');


// add front end scripts
function herhesh_ml_add_scripts()
{
    wp_enqueue_style('herhesh_ml_main_style', plugins_url() . '/movie-listings/assets/css/style.css');
    wp_enqueue_script('herhesh_ml_main_script', plugins_url() . '/movie-listings/assets/js/main.js',['jquery']);
}
add_action('wp_enqueue_scripts', 'herhesh_ml_add_scripts');
