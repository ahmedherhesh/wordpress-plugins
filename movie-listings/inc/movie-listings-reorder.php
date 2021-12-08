<?php 
function herhesh_ml_add_submenu_page(){
    add_submenu_page( 'edit.php?post_type=herhesh_movie', 'Custom Order', 'Custom Order', 'manage_options', 'custom_order', 'herhesh_ml_recorder_callback');
}
add_action( 'admin_menu', 'herhesh_ml_add_submenu_page' );
function herhesh_ml_recorder_callback(){
    $args = [
        'post_type' => 'herhesh_movie',
        'orderby'   => 'menu_order',
        'order'     => 'ASC',
        'post_status' => 'publish',
        'no_found_rows' => true,
        'update_post_term_cache' => false,
        'post_per_page' => 50
    ];
    $movie_listings = new WP_Query($args);
    ?>
        <div id="movie-short" class="wrap">
            <h2>Sort Movie Listings <img class="loading" src='<?php echo esc_url(admin_url().'/images/loading.gif'); ?>'></h2>
            <div class="order-save-msg updated">Listings Order Saved</div>
            <div class="order-save-err error">Something Went Wrong</div>
            <?php if($movie_listings->have_posts()) : ?>
                <ul class="movie-sort-list">
                    <?php 
                        while($movie_listings->have_posts()){
                            $movie_listings->the_post();
                            ?>
                                <li id='<?php esc_attr(the_id()); ?>'>
                                    <?php the_title(); ?>
                                </id>
                            <?php
                        }
                    ?>
                </ul>
            <?php else: ?>
                <p>No Movies To List</p>
            <?php endif;?>
        </div>
    <?php
}

function herhesh_ml_save_order(){
    // Check nonce/token
    // if(!check_ajax_referer('herhesh-ml-token', 'token' )){
    //     return wp_send_json_error('Invalid Token' );
    // }
    if(!current_user_can('manage_options')){
        return wp_send_json_error('Not Authorized');
    }

    $order = $_POST['order'];

    $counter = 0;
    foreach($order as $listing_id){
        $listings = [
            'ID' => (int)$listing_id,
            'menu_order' => $counter
        ];
        wp_update_post($listings);
        $counter++;
    }
    wp_send_json_success('Listing Order Saved');
}
add_action('wp_ajax_save_order','herhesh_ml_save_order');