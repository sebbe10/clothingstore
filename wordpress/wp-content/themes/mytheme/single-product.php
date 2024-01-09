<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <?php
    get_header() ?>
    <?php

    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    endif;
    ?>

    <?php get_comments() ?>


    <div class="theReviewsAndComments">
        <button class="theReviewButton" onclick="addReviews()">Add reviews</button>
        <button class="theShowCommentsButton" onclick="showReviews()">Show Reviews</button>
    </div>
    <div class="comments" id="comments">
        <h2><?php
            if (get_option('woocommerce_enable_review_rating') === 'yes' && ($count = $product->get_rating_count()))
                printf(_n('%s review for %s', '%s reviews for %s', $count, 'woocommerce'), $count, get_the_title());
            else
                _e('Reviews', 'woocommerce');
            ?></h2>

        <!--  -->
        <?php
        global $product;
        global $name;
        $id = $product->id;
        // echo 'Användar id:' . $id;
        $args = array('post_type' => 'product', 'post_id' => $id);
        $comments = get_comments($args);
        wp_list_comments(array('callback' => 'woocommerce_comments'), $comments);
        ?>

        <!--  -->



        <?php if (have_comments()) : ?>

            <ol class="commentlist">
                <?php wp_list_comments(apply_filters('woocommerce_product_review_list_args', array('callback' => 'woocommerce_comments'))); ?>
            </ol>

            <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) :
                echo '<nav class="woocommerce-pagination">';
                paginate_comments_links(apply_filters('woocommerce_comment_pagination_args', array(
                    'prev_text' => '&larr;',
                    'next_text' => '&rarr;',
                    'type'      => 'list',
                )));
                echo '</nav>';
            endif; ?>

        <?php else : ?>

            <p class="woocommerce-noreviews"><?php _e('There are no reviews yet.', 'woocommerce');  ?></p>

        <?php endif; ?>
    </div>

    <div class="reviews">


        <?php if (get_option('woocommerce_review_rating_verification_required') === 'no' || wc_customer_bought_product('', get_current_user_id(), $product->id)) : ?>

            <div id="review_form_wrapper">
                <div id="review_form">
                    <?php
                    $commenter = wp_get_current_commenter();

                    ?>

                    <?php
                    $comment_form = array(
                        // Be the first to review
                        'title_reply'          => have_comments() ? __('Add a review', 'woocommerce') : __('Review:', 'woocommerce') . ' ' . get_the_title(),
                        'title_reply_to'       => __('Leave a Reply to %s', 'woocommerce'),
                        'comment_notes_before' => '',
                        'comment_notes_after'  => '',
                        'fields'               => array(
                            'author' =>  '<p class="comment-form-author">' . '<label for="author">' . __('Name', 'woocommerce') . ' <span class="required">*</span></label> ' .
                                '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" aria-required="true" /></p>',
                            'email'  => '<p class="comment-form-email"><label for="email">' . __('Email', 'woocommerce') . ' <span class="required">*</span></label> ' .
                                '<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" aria-required="true" /></p>',
                        ),
                        'label_submit'  => __('Submit', 'woocommerce'),
                        'logged_in_as'  => '',
                        'comment_field' => ''
                    );


                    if (get_option('woocommerce_enable_review_rating') === 'yes') {
                        $comment_form['comment_field'] = '<p class="comment-form-rating"><label class="theRating" for="rating">' . __('Your Rating', 'woocommerce') . '</label>    <select name="rating" id="rating">
                        <option value="">' . __('Rate&hellip;', 'woocommerce') . '</option>
                        <option value="5">' . __('Perfect', 'woocommerce') . '</option>
                        <option value="4">' . __('Good', 'woocommerce') . '</option>
                        <option value="3">' . __('Average', 'woocommerce') . '</option>
                        <option value="2">' . __('Not that bad', 'woocommerce') . '</option>
                        <option value="1">' . __('Very Poor', 'woocommerce') . '</option>
                        </select>
                        </p>';
                    }

                    $comment_form['comment_field'] .= '<div class="theReviewAboutProduct"><label for="comment">' . __('Skriv vad du tycker om produkten', 'woocommerce') . '</label>' . '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="30" rows="4" aria-required="true"></textarea></p>
                    </div>';


                    comment_form(apply_filters('woocommerce_product_review_comment_form_args', $comment_form));
                    ?>
                </div>
            </div>
    </div>
    </div>
    </div>

<?php else : ?>

    <p class="woocommerce-verification-required"><?php _e('Only logged in customers who have purchased this product may leave a review.', 'woocommerce'); ?></p>

<?php endif; ?>

<div class="clear"></div>

</div>



<script>
    function addReviews() {
        document.querySelector('.reviews').classList.toggle('theshow')
        document.querySelector('.comments').classList.remove('showcomments')
        document.querySelector('.theReviewButton').classList.toggle('youactive')
        // document.querySelector('.theShowCommentsButton').classList.remove('youactive')
        document.querySelector('.theShowCommentsButton').classList.toggle('youactive')


    }

    function showReviews() {
        document.querySelector('.comments').classList.toggle('showcomments')
        document.querySelector('.reviews').classList.remove('theshow')
        document.querySelector('.theShowCommentsButton').classList.toggle('youactive')
        // document.querySelector('.theReviewButton').classList.remove('youactive')
        document.querySelector('.theReviewButton').classList.toggle('youactive')
    }
</script>



<?php get_footer() ?>


</body>

</html>