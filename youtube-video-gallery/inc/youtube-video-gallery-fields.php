<?php

function herhesh_yvg_fields_metabox(){
    add_meta_box( 'herhesh_yvg_fields', 'Video Fields', 'herhesh_yvg_fields_callback', 'youtube_vid_gallery','normal','default' );
}
add_action( 'add_meta_boxes', 'herhesh_yvg_fields_metabox');

function herhesh_yvg_fields_callback($post){
    wp_nonce_field( basename(__FILE__), 'herhesh_yvg_videos_nonce');
    $post_meta = get_post_meta($post->ID);
    ?>
    <div class="wrap video-form">
        <div class="form-group">
            <label for="video_id">Video ID</label>
            <input type="text" name="video_id" id="video_id" value="<?php if(!empty($post_meta['video_id'])){echo esc_attr($post_meta['video_id'][0]);} ?>">
        </div>
        <div class="form-group">
            <label for="details">Details</label>
            <?php 
            $content = $post_meta['details'][0];
            $editor = 'details';
            $settings = [
                'textarea_rows' => 15,
                'media_buttons' => false
            ];

            wp_editor( $content, $editor, $settings );

            ?>
        </div>
        <?php if(isset($post_meta['video_id'][0])) : ?>
            <iframe width="500" height="315" src="https://www.youtube.com/embed/<?php echo $post_meta['video_id'][0];?>" frameborder="0" allowfullscreen></iframe>
        <?php endif; ?>
        

    </div>
    <?php
}
function herhesh_yvg_video_save($post_id){

    if(isset($_POST['video_id'])){
        update_post_meta($post_id,'video_id', sanitize_text_field( $_POST['video_id'] ));
    }
    if(isset($_POST['details'])){
        update_post_meta($post_id,'details',  $_POST['details'] );
    }
}
add_action('save_post','herhesh_yvg_video_save');
