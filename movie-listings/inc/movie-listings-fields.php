<?php
function herhesh_add_fields_ml_metabox(){
    add_meta_box( 'herhesh_ml_listings_info', 'Listings Info', 'herhesh_add_fields_ml_callback','herhesh_movie');
}
add_action('add_meta_boxes','herhesh_add_fields_ml_metabox');

function herhesh_add_fields_ml_callback($post){
    wp_nonce_field( basename(__FILE__),'herhesh_ml_nonce');
    $post_meta = get_post_meta( $post->ID );
    ?>
    <div class="wrap movie-listing-form">
        <div class="form-group">
            <label for="movie_id">Movie Listing ID: </label>
            <input class='full'  type="text" name="movie_id" id="movie_id" value="<?php if(!empty($post_meta['movie_id'])){echo $post_meta['movie_id'][0];} ?>">
        </div>
        <div class="form-group">
            <label for="mpaa_rating">MPAA Rating: </label>
            <select class='full'  name="mpaa_rating" id="mpaa_rating">
                <?php 
                    $option_values = ['G', 'PG', 'PG-13', 'R', 'NR'];
                    foreach($option_values as $value){
                        $value_check = $value == $post_meta['mpaa_rating'][0] ? 'selected' : '';
                        echo "<option value='$value' $value_check>$value</option>";
                    }
                ?>
            </select>
        </div>
        <?php if(get_option('ml_setting_show_editor')): ?>
        <div class="form-group">
            <label for="details">Details:</label>
            <?php 
                $content = $post_meta['details'][0];
                $editor_id = 'details';
                $settings = [
                    'textarea_rows' => 15,
                    'media_buttons' => get_option( 'ml_setting_show_media_buttons') ? true : false
                ];
                wp_editor( $content, $editor_id, $settings );
            ?>
        </div>
        <?php else:?>
            <div class="form-group">
            <label for="details">Details</label>
            <textarea  class='full' name="details" id="details" rows="5" > 
                <?php if(!empty($post_meta['details'])){echo $post_meta['details'][0];} ?>
            </textarea>
        </div>
        <?php endif; ?>
        <div class="form-group">
            <label for="release_date">Release Date:</label>
            <input class='full' type="date" name="release_date" id="release_date" value="<?php if(!empty($post_meta['release_date'])){echo $post_meta['release_date'][0];} ?>">
        </div>
        <div class="form-group">
            <label for="director">Director:</label>
            <input class='full' type="text" name="director" id="director" value="<?php if(!empty($post_meta['director'])){echo $post_meta['director'][0];} ?>">
        </div>
        <div class="form-group">
            <label for="stars">Stars:</label>
            <input type="text" name="stars" id="stars" value="<?php if(!empty($post_meta['stars'])){echo $post_meta['stars'][0];} ?>">
        </div>
        <div class="form-group">
            <label for="runtime">Runtime:</label>
            <input class='full' type="text" name="runtime" id="runtime" value="<?php if(!empty($post_meta['runtime'])){echo $post_meta['runtime'][0];} ?>"><span> Mins</span>
        </div>
        <div class="form-group">
            <label for="trailer">Youtube ID / trailer:</label>
            <input class='full' type="text" name="trailer" id="trailer" value="<?php if(!empty($post_meta['trailer'])){echo $post_meta['trailer'][0];} ?>">
        </div>
    </div>
    <?php
}

function herhesh_ml_meta_save($post_id){
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = isset($_POST['herhesh_ml_nonce']) && wp_verify_nonce('herhesh_ml_nonce' ,basename(__FILE__)) ? true : false;
    
    if($is_autosave || $is_revision || $is_valid_nonce){
        return;
    }
    $fields = ['movie_id', 'mpaa_rating', 'details', 'release_date', 'director', 'stars', 'runtime', 'trailer'];

    foreach($fields as $field){
        if($_POST[$field]) {
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ));
        }
    }
}
add_action('save_post','herhesh_ml_meta_save');