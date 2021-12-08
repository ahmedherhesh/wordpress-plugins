<?php
function herhesh_tl_sc($atts,$content = null){
    global $post;
    $atts = shortcode_atts([
        'title'     => 'Todos',
        'count'     => 10,
        'category'  => 'all'
    ],$atts);

    if($atts['category'] == 'all'){
        $terms = '';
    }else{
        $terms = [
            'taxonomy'  => 'category',
            'field'     => 'slug',
            'terms'     => $atts['category']
        ];
    }
    $args = [
        'post_type'     => 'todo',
        'post_status'   => 'publish',
        'orderby'       => 'due_date',
        'order'         => 'ASC',
        'posts_per_page'=> $atts['count'],
        'tax_query'     => $terms
    ];
    //get data
    $todos = new WP_Query($args);
    //data loops
    if($todos->have_posts()){
        $category   = strtolower(str_replace('-',' ',$atts['category']));
        $output .= "<div class='todo-list'>";
            while($todos->have_posts()){
                $todos->the_post();
                $priority   = get_post_meta($post->ID, 'priority', true);
                $details    = get_post_meta($post->ID, 'details',  true);
                $due_date   = get_post_meta($post->ID, 'due_date', true);
                $output    .= 
                "<div class='todo'>
                    <h4>". get_the_title() ."</h4>
                    <div>Details: $details</div>
                    <div class='priority-".strtolower($priority)."'>Priority: $priority</div>
                    <div class='due_date'>Date: $due_date</div>
                </div>";
            }
        $output .= "</div>";
        wp_reset_postdata();
        return $output;
    }
    return '<p>No Todos</p>';
}

// save shortcode
add_shortcode( 'todos', 'herhesh_tl_sc' );