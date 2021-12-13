<?php

/**
 * Plugin Name: Herhesh Books
 * Description: Add your books in your website easly
 * Version: 1.0
 * Author: Ahmed Herhesh
 */


// files requirements

$path = __DIR__ . '/inc';
$admin_files = ['herhesh-books-cpt.php', 'herhesh-books-fields.php', 'herhesh-books-fields.php'];
foreach (scandir($path) as $key => $file) {
    if ($key > 1) {
        if (in_array($file, $admin_files)) {
            if (!is_admin()) {
                continue;
            }
            require_once "$path/$file";
        } else {
            require_once "$path/$file";
        }
    }
}
// books template
function herhesh_books_template($template)
{
    global $post;
    if ($post->post_type == 'herhesh_books') {
        $template = plugin_dir_path(__FILE__) . 'templates/single-book-template.php';
    }
    return $template;
}
add_filter('single_template', 'herhesh_books_template');

//author template
function herhesh_books_author_template($template)
{
    // if (is_author()) {
        $template = plugin_dir_path(__FILE__) . 'templates/book-author-template.php';
    // }
    return $template;
}
add_filter('template_include', 'herhesh_books_author_template');
