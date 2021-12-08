<?php

function herhesh_yvg_cpt(){
    $name = 'Videos';
    $singular_name = 'Video';
    $labels = [
        'name'               => $name,
        'singular_name'      => $singular_name,
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New' . $singular_name,
        'edit'               => 'Edit',
        'edit_item'          => 'Edit' . $singular_name,
        'new_item'           => 'New' . $singular_name,
        'view'               => 'View',
        'search_items'       => 'Search' . $name,
        'not_found'          => 'No' . $name . 'Found',
        'not_found_in_trash' => 'No' . $name . 'Found',
    ];
    $args = [
        'labels'            => $labels,
        'desription'        => 'youtube video gallery by category',
        'taxonomies'        => ['category'],
        'public'            => true,
        'show_on_menu'      => true,
        'menu_position'     => 5,
        'menu_icon'         => 'dashicons-video-alt',
        'query_var'         => true,
        'can_export'        => true,
        'show_in_nav_menus' => true,
        'rewrite'           => ['slug' => 'youtube video gallery'],
        'capability_type'   => 'post',
        'supports'          => ['title'],
    ];
    register_post_type('youtube_vid_gallery', $args );
}

add_action('init', 'herhesh_yvg_cpt');