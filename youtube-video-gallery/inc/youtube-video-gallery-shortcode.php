<?php

function herhesh_yvg_list_video($atts,$content = null){
    global $post;
    $atts = shortcode_atts( [
        'title'     => 'Video Gallery',
        'count'     => 20,
        'category'  => 'all'
    ], $atts );

    if($atts['category'] == 'all'){
        $terms = '';
    }else{
        $terms = [
            'taxonomy' =>'category',
            'field'    => 'slug',
            'terms'    => $atts['category']     
        ];
    }

    $args = [
        'post_type'     => 'youtube_vid_gallery',
        'post_status'   => 'publish',
        'orderby'       => 'created',
        'order'         => 'ASC',
        'posts_perpage' => $atts['count'],
        'tax_query'     => $terms
    ];
    $fullscreen_status = get_option('yvg_setting_disable_fullscreen') ? 'allowfullscreen'  : '';
    $videos = new WP_Query($args);

    if($videos->have_posts()){
        
        // $category   = str_replace('-',' ', $atts['category']);
        $output     = "<div class='video-list'>";
            while($videos->have_posts()){
                $videos->the_post();
                $video_id = get_post_meta( $post->ID, 'video_id',true);
                $details  = get_post_meta( $post->ID, 'details',true);
                    $output.="
                                <div class='yvg-video'>
                                    <h4 style='text-align:center'>".get_the_title()."</h4>
                                    <iframe width='560' height='315' src='https://www.youtube.com/embed/$video_id' frameborder='0' $fullscreen_status></iframe>
                                    <div>$details</div>
                                </div><br></hr>
                            ";
            }
        $output    .= "</div>";

        wp_reset_postdata();
        return $output;
    }else{
        return '<p>No Videos Found</p>';
    }

}

add_shortcode('y_video', 'herhesh_yvg_list_video');