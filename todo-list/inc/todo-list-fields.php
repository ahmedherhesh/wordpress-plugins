<?php
function herhesh_tl_fields_metabox()
{
    add_meta_box('herhesh_tl_todo_fields', 'Todo Fields', 'herhesh_tl_fields_callback','todo');
}
add_action('add_meta_boxes', 'herhesh_tl_fields_metabox');
function herhesh_tl_fields_callback($post)
{
    wp_nonce_field(basename(__FILE__), 'wp_todos_nonce');
    $post_meta = get_post_meta($post->ID);
    ?>
    <div class="wrap todo-form">
        <div class="form-group">
            <label for="priority">Priority</label>
            <select name="priority" id="priority">
                <?php
                $option_values = ['low', 'normal', 'high'];
                foreach ($option_values as $value) {
                    echo $post_meta['priority'][0] ==  $value ?
                        "<option selected value='$value'>$value</option>" :
                        "<option value='$value'>$value</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <!-- Add Editor -->
    <div class="form-group">
        <label for="details">Details</label>
        <?php 
        $content  = get_post_meta($post->ID,'details',true);
        $editor   = 'details';
        $settings = [
            'textarea_rows' => 15,
            'media_buttons' => true
        ];
        wp_editor($content,$editor,$settings);
        ?>
    </div>
    <div class="form-group">
        <label for="due-date">Due Date</label>
        <input type="date" name="due_date" id="due_date" value="<?php if(!empty($post_meta['due_date'])) {echo esc_attr($post_meta['due_date'][0]);} ?>">
    </div>
<?php
    //run to save value meta
}
function herhesh_todos_save($post_id){
    $is_autosave = wp_is_post_autosave( $post_id ); 
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = (isset($_POST['wp_todos_nonce']) && wp_verify_nonce( $_POST['wp_todos_nonce'], basename(__FILE__)) ? 'true' : 'false');
    if($is_autosave || $is_revision || !$is_valid_nonce){
        return;
    }
    if(isset($_POST['priority'])){
        update_post_meta($post_id,'priority', sanitize_text_field( $_POST['priority'] ));
    }
    if(isset($_POST['details'])){
        update_post_meta($post_id,'details',  $_POST['details'] );
    }
    if(isset($_POST['due_date'])){
        update_post_meta($post_id,'due_date',sanitize_text_field( $_POST['due_date']));
    }
}
add_action('save_post', 'herhesh_todos_save');
