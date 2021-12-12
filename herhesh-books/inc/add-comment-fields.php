<?php
add_action('comment_form_logged_in_after', 'herhesh_book_ccf');
add_action('comment_form_after_fields', 'herhesh_book_ccf');
function herhesh_book_ccf()
{
?>
    <p class="comment-form-title">
        <span class="icons" dir="ltr">
            <span class="dashicons dashicons-star-filled star" data-value='1'></span>
            <span class="dashicons dashicons-star-filled star" data-value='2'></span>
            <span class="dashicons dashicons-star-filled star" data-value='3'></span>
            <span class="dashicons dashicons-star-filled star" data-value='4'></span>
            <span class="dashicons dashicons-star-filled star" data-value='5'></span>
        </span>
        <input type="hidden" name="herhesh_comment_rating" id="stars_value" />
    </p>
<?php
}
// add_action('comment_post', 'herhesh_book_ccf_save', 10, 1);
add_action('comment_post', 'herhesh_book_ccf_save');
function herhesh_book_ccf_save($comment_id)
{
    if (isset($_POST['herhesh_comment_rating']))
        update_comment_meta($comment_id, 'herhesh_comment_rating', esc_attr($_POST['herhesh_comment_rating']));
}



/**
 * Cheating.  Get everything to be styled nicely in Twenty Elevent
 */
// add_action('wp_head', 'pmg_comment_tut_style_cheater');
// function pmg_comment_tut_style_cheater()
// {

// }

/**
 * Add the title to our admin area, for editing, etc
 */
// add_action('add_meta_boxes_comment', 'pmg_comment_tut_add_meta_box');
// function pmg_comment_tut_add_meta_box()
// {
//     add_meta_box('pmg-comment-title', __('Comment Title'), 'pmg_comment_tut_meta_box_cb', 'comment', 'normal', 'high');
// }

// function pmg_comment_tut_meta_box_cb($comment)
// {
//     $title = get_comment_meta($comment->comment_ID, 'herhesh_comment_rating', true);
//     wp_nonce_field('pmg_comment_update', 'pmg_comment_update', false);

// }

/**
 * Save our comment (from the admin area)
 */
// add_action('edit_comment', 'pmg_comment_tut_edit_comment');
// function pmg_comment_tut_edit_comment($comment_id)
// {
//     if (!isset($_POST['pmg_comment_update']) || !wp_verify_nonce($_POST['pmg_comment_update'], 'pmg_comment_update')) return;
//     if (isset($_POST['herhesh_comment_rating']))
//         update_comment_meta($comment_id, 'herhesh_comment_rating', esc_attr($_POST['herhesh_comment_rating']));
// }




/**
 * add our headline to the comment text
 * Hook in way late to avoid colliding with default
 * WordPress comment text filters
 */
// add_filter('comment_text', 'pmg_comment_tut_add_title_to_text', 99, 2);
// function pmg_comment_tut_add_title_to_text($text, $comment)
// {
//     if (is_admin()) return $text;
//     if ($title = get_comment_meta($comment->comment_ID, 'herhesh_comment_rating', true)) {
//         $title = '<h3>' . esc_attr($title) . '</h3>';
//         $text = $title . $text;
//     }
//     return $text;
// }
