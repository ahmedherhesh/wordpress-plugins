<?php
function herhesh_ml_shortcode($atts, $content = null)
{
    $atts = shortcode_atts([
        'title' => 'Latest Movies',
        'count' => 12,
        'genre' => 'all',
        'pagination' => 'off'
    ], $atts);
    $pagination = $atts['pagination'] == 'on' ? false : true;
    $paged = get_query_var('paged') ? get_query_var('paged') :  1;

    $terms = $atts['genre'] == 'all' ? '' : [
        [
            'taxonomy'  => 'genres',
            'field'     => 'slug',
            'terms'     => $atts['genre']
        ]
    ];

    $args = [
        'post_type' => 'herhesh_movie',
        'post_status' => 'publish',
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'no_found_rows' => $pagination,
        'posts_per_page' => $atts['count'],
        'paged' => $paged,
        'tax_query' => $terms
    ];

    $movies = new WP_Query($args);

    if($movies->have_posts()){
        $output = "<div class='movie-list'>";
        while($movies->have_posts()){
            $movies->the_post();
            $image = wp_get_attachment_image_src(get_post_thumbnail_id(),'single-post-thumbnail');
            $output.= "
                <div class='movie-col'>
                    <img class='feat-image' src='".$image[0]."'>
                    <h5 class='movie-title'>".get_the_title()."</h5>
                    <a href='".get_permalink( )."'>View Details</a>
                </div>
            ";
        }
        $output.= "<div style='clear:both'></div>";
        $output.= "</div>";
        wp_reset_postdata();
        return $output;
    }else{
        return '<p>No Movies Found</p>';
    }
}

add_shortcode('movies', 'herhesh_ml_shortcode' );