<?php
get_header();
$post_online_store = get_post_meta($post->ID, 'online-stores', true);
$post_quotes = get_post_meta($post->ID, 'quotes', true);
// The comment Query
// $comments_query = new WP_Comment_Query;
// $comments = $comments_query->query(['status' => 'approve','post_ID' => $post->ID]);
$comments = get_comments(['post_id' => $post->ID]);
$ratings = 0;
$reviews = 0;
$book_author = get_the_terms($post->ID, 'book-author')[0];
if ($comments) {
    foreach ($comments as $key => $comment) {
        $key++;
        $ratings += get_comment_meta($comment->comment_ID, 'herhesh_comment_rating', true);
        $reviews = $key;
    }
}
$ratings_result = $ratings && $reviews ? $ratings / $reviews : 0;
function rating($comment_id, $rating_val = null)
{
    $rating = get_comment_meta($comment_id, 'herhesh_comment_rating', true);
    if ($rating_val <= $rating) {
        echo "style='color:orange' data-rating='$rating'";
    }
}
?>
<style>
    .title{
        font-size:30px
    }
    .rating{
        text-align: left;
    }
</style>
<div class='container'>
    <div class='single-book row' style="padding:10px">
        <img class='book-img col-md-2' src='<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>'>
        <div class='details col-md-4' style="text-align: right;">
            <h2 class="title" style="margin:0"><?php the_title(); ?></h2>
            <?php if ($book_author) : ?>
                <p style="text-align: left;">
                    by
                    <a href="<?php echo get_term_link($book_author->term_id, 'book-author'); ?>" class="author">
                        <?php echo ucfirst($book_author->name); ?>
                    </a>
                </p>
            <?php endif; ?>
            <div class="rating">
                <span class="icons" dir='ltr'>
                    <span class="dashicons dashicons-star-filled" <?php echo $ratings_result >= 1 ? "style='color:orange'" : ''; ?>></span>
                    <span class="dashicons dashicons-star-filled" <?php echo $ratings_result >= 2 ? "style='color:orange'" : ''; ?>></span>
                    <span class="dashicons dashicons-star-filled" <?php echo $ratings_result >= 3 ? "style='color:orange'" : ''; ?>></span>
                    <span class="dashicons dashicons-star-filled" <?php echo $ratings_result >= 4 ? "style='color:orange'" : ''; ?>></span>
                    <span class="dashicons dashicons-star-filled" <?php echo $ratings_result >= 5 ? "style='color:orange'" : ''; ?>></span>
                </span>
                <span style="margin-right: 5px;">. <?php echo substr($ratings_result, 0, 3); ?></span>
                <span>. <?php echo $ratings; ?> ratings</span>
                <span>. <?php echo $reviews; ?> reviews</span>
            </div><br>
            <div class="description"><?php the_excerpt(); ?></div>
            <div class="online-stores">
                <?php
                if (!empty(json_decode($post_online_store))) {
                    foreach (json_decode($post_online_store) as $store) {
                        if ($store->name && $store->link) {
                            echo "<a target=_blank href='$store->link'>$store->name</a> ";
                        }
                    }
                }
                ?>

            </div>
            <div class="comments-section">
                <h1 class="comments-section-title title">التعليقات على المنتج</h1>
                <?php
                // comments_template(); 

                // Comment Loop
                // print_r($comments);
                if ($comments) {
                    foreach ($comments as $comment) {
                ?>
                        <div class="comment">
                            <h2 class="comment-author"><?php echo $comment->comment_author; ?></h2>
                            <p> <?php echo $comment->comment_author_email; ?> </p>
                            <p> <?php echo $comment->comment_content; ?> </p>
                            <p class="rating">
                                <span class="icons" dir='ltr'>
                                    <span class="dashicons dashicons-star-filled" <?php rating($comment->comment_ID, 1); ?>></span>
                                    <span class="dashicons dashicons-star-filled" <?php rating($comment->comment_ID, 2); ?>></span>
                                    <span class="dashicons dashicons-star-filled" <?php rating($comment->comment_ID, 3); ?>></span>
                                    <span class="dashicons dashicons-star-filled" <?php rating($comment->comment_ID, 4); ?>></span>
                                    <span class="dashicons dashicons-star-filled" <?php rating($comment->comment_ID, 5); ?>></span>
                                </span>
                            </p>
                            <hr>
                        </div>
                <?php
                    }
                }
                comment_form();
                ?>
            </div>
        </div>
        <?php
        if (!empty(json_decode($post_quotes))) { ?>
            <div class="col-md-1"></div>
            <div class="col-md-3 quotes">
                <h2 class="title">Quotes</h2>
            <?php
            foreach (json_decode($post_quotes) as $key => $quote) {
                echo "<p>$quote</p>";
            }
        }
            ?>
            </div>
    </div>
</div>
<?php get_footer(); ?>