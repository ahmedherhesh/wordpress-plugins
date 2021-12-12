<?php 
function herhesh_books_metabox_fields(){
    add_meta_box( 'herhesh_books_fields', "More Options", 'herhesh_books_fields_callback', 'herhesh_books');
}
add_action( 'add_meta_boxes', 'herhesh_books_metabox_fields');
function herhesh_books_fields_callback($post){
    $post_meta = get_post_meta($post->ID);
    $online_stores = json_decode($post_meta['online-stores'][0]);
    ?>
    <style>
        .online-store-links input{
            padding:5px;
        }
    </style>
    <div class="more-options">
        <div class="online-store-links">
            <h3>Online Store Links</h3>
            <div class="amazon">
                <input type="text" name="online-stores[0][name]" value="<?php echo $online_stores[0]->name ?>" placeholder="Online Store Name" style="width: 29%;">
                <input type="text" name="online-stores[0][link]" value="<?php echo $online_stores[0]->link ?>" placeholder="Online Store Link" style="width: 70%;">
            </div><br>
            <div class="jumia">
                <input type="text" name="online-stores[1][name]" value="<?php echo $online_stores[1]->name ?>" placeholder="Online Store Name" style="width: 29%;">
                <input type="text" name="online-stores[1][link]" value="<?php echo $online_stores[1]->link ?>" placeholder="Online Store Link" style="width: 70%;">
            </div><br>
        </div>
        <hr>
        <div class="quotes">
            <h3>Add Quotes</h3>
            <textarea name="quotes[0]" placeholder="Write Your Quote" style="width:100%" rows="5"><?php echo json_decode($post_meta['quotes'][0])[0] ?></textarea>
            <textarea name="quotes[1]" placeholder="Write Your Quote" style="width:100%" rows="5"><?php echo json_decode($post_meta['quotes'][0])[1] ?></textarea>
        </div>
    </div>
    <?php
}

function herhesh_books_more_details_save($post_id){
    
    if(isset($_POST['online-stores'])){
        update_post_meta( $post_id, 'online-stores', wp_json_encode($_POST['online-stores']));
    }
    if(isset($_POST['quotes'])){
        update_post_meta( $post_id, 'quotes', wp_json_encode($_POST['quotes']));
    }
}
add_action( 'save_post','herhesh_books_more_details_save');