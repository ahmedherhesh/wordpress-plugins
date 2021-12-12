<?php
function herhesh_books_cpt(){
    $labels = [
        'name'               => 'Books',
        'singular_name'      => 'Book'
    ];
    $args   = [
        'labels'            => $labels,
        'taxonomies'        => ['book-author'],
        'public'            => true,
        'show_on_menu'      => true,
        'menu_position'     => 5,
        'menu_icon'         => 'dashicons-book-alt',
        'capability_type'   => 'post',
        'supports'          => ['title','thumbnail','excerpt','comments'],
    ];
    register_post_type( 'herhesh_books', $args );
}
add_action('init','herhesh_books_cpt');