<?php 
function herhesh_books_author_taxonomy(){
    $name = "Authors";
    $singular_name = "Author";
    $labels = [
        "name" => "$name",
        "singular_name" =>"$singular_name",
        "all_items" => "All $name",
        "edit_item" => "Edit $singular_name",
        'parent_item' => "Parent $singular_name",
        "new_item_name" => "New $singular_name",
        "add_or_remove_items" => "Add Or Remove $singular_name",
        "add_new_item" => "Add New $singular_name"
    ];
    register_taxonomy( 
        "book-author", 
        "herhesh_books",
        [
            "labels"     => $labels,
            "hierarchical" => true,
            "query_var" => true,
            "rewrite"   => [
                "slug"  => "book-author",
                "with_front" => false
            ]
        ]
    );
}

add_action( "init", "herhesh_books_author_taxonomy");
