<?php
// movie listining custom post type
function herhesh_ml_cpt(){
    $name = 'Movie Listings' ;
    $singular_name = 'Movie Listing' ;
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
        'parent_item_colon'  => 'Parent ' . $singular_name,
        'menu_name'          => $name,
    ];
    $args = [
        'labels'            => $labels,
        'desription'        => 'Movie by listinig by herhesh',
        'taxonomies'        => ['genres'],
        'public'            => true,
        'show_on_menu'      => true,
        'menu_position'     => 7,
        'menu_icon'         => 'dashicons-video-alt2',
        'query_var'         => true,
        'can_export'        => true,
        'show_in_nav_menus' => true,
        'rewrite'           => ['slug' => 'herhesh_movie'],
        'capability_type'   => 'post',
        'supports'          => ['title','thumbnail'],
    ];
    register_post_type('herhesh_movie', $args );
}
add_action('init', 'herhesh_ml_cpt');

function herhesh_ml_genres_taxonomy(){
    register_taxonomy( 
        'genres', 
        'herhesh_movie',
        [
            'label'     => 'Genres',
            'hierarchical' => true,
            'query_var' => true,
            'rewrite'   => [
                'slug'  => 'genre',
                'with_front' => false
            ]
        ]
    );
}

add_action( 'init', 'herhesh_ml_genres_taxonomy');