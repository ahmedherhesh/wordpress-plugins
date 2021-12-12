<?php
function herhesh_books_shortcode($atts, $content = null)
{
    global $post;
    $atts = shortcode_atts([
        'title' => 'Herhesh Books',
        'count' => 20
    ], $atts);
    $args = [
        'post_type'     => 'herhesh_books',
        'post_status'   => 'publish',
        'orderby'       => 'created',
        'order'         => 'DESC',
        'posts_perpage' => $atts['count'],
    ];

    $books = new WP_Query($args);
    if ($books->have_posts()) {
        $output = "<div class='herhesh-books'>";
        while ($books->have_posts()) {
            $books->the_post();
            $output .= "
                <a class='book' href='" . get_permalink() . "'>
                    <img class='book-img' src='" . get_the_post_thumbnail_url(get_the_ID()) . "'> 
                </a>
                ";
        }
        $output .= "</div>";
        return $output;
        // <h4>" . get_the_title() . "</h4>
        // <p class='description'>" . get_the_content() . "</p>
    }
    return 'Books is not found yet';
}
add_shortcode('herhesh_books', 'herhesh_books_shortcode');
