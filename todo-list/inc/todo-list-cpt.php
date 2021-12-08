<?php
function herhesh_tl_cpt(){
    $name = apply_filters( 'herhesh_tl_label_plural', 'Todos' );
    $singular_name = apply_filters( 'herhesh_tl_label_single', 'Todo' );
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
    $args = apply_filters('herhesh_tl_args' , [
        'labels'            => $labels,
        'desription'        => 'Todo by category',
        'taxonomies'        => ['category'],
        'public'            => true,
        'show_on_menu'      => true,
        'menu_position'     => 5,
        'menu_icon'         => 'dashicons-edit',
        'query_var'         => true,
        'can_export'        => true,
        'show_in_nav_menus' => true,
        'rewrite'           => ['slug' => 'todo'],
        'capability_type'   => 'post',
        'supports'          => ['title'],
    ]);
    register_post_type( 'todo', $args );
}
add_action('init', 'herhesh_tl_cpt');