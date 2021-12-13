<?php

function herhesh_add_assets_file(){
    wp_enqueue_style( 'herhesh_books_main_bootstrap_style',  'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', [], '','all' );
    wp_enqueue_style( 'herhesh_books_main_style', plugins_url() . '/herhesh-books/assets/css/style.css', ['dashicons'], '','all' );
    wp_enqueue_script( 'herhesh_books_main_js', plugins_url() . '/herhesh-books/assets/js/main.js', ['jquery'], '','all' );
}
add_action( 'wp_enqueue_scripts', 'herhesh_add_assets_file');