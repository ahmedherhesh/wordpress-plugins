<?php

function herhesh_add_assets_file(){
    wp_enqueue_style( 'herhesh_books_main_style', plugins_url() . '/herhesh-books/assets/css/style.css', ['dashicons'], '','all' );
    wp_enqueue_script( 'herhesh_books_main_js', plugins_url() . '/herhesh-books/assets/js/main.js', ['jquery'], '','all' );
}
add_action( 'wp_enqueue_scripts', 'herhesh_add_assets_file');