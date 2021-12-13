<?php
get_header();
$book_author = get_the_terms($post->ID, 'book-author')[0];
?>
<div class="container">
    <div class="row book-author-page">
        <div class="author-img col-md-2">
            <img src="<?php echo plugins_url() . '/herhesh-books/assets/imgs/me.jpg'; ?>" alt="author-image" style="height: 300px;">
        </div>
        <div class="details col-md-4">
            <p> <?php echo $book_author->name; ?></p>
            <p> <?php echo $book_author->description; ?></p>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="row">
        <div class="books col-md-1">
            <?php
            $books = new WP_Query([
                'post_type' => 'herhesh_books',
                'book-author' => "$book_author->name"
            ]);
            while ($books->have_posts()) : $books->the_post();
                echo "<a class='book' href='" . get_permalink() . "'>
                    <img class='book-img' src='" . get_the_post_thumbnail_url(get_the_ID()) . "'> 
                  </a>";
            endwhile;
            ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>