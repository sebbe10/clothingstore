<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php get_header() ?>

    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    endif;
    ?>


    <ul class="products">
        <?php
        /*
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 12
        );
        $loop = new WP_Query($args);
        if ($loop->have_posts()) {
            while ($loop->have_posts()) : $loop->the_post();
                wc_get_template_part('content', 'product');
            endwhile;
        } else {
            echo __('No products found');
        }
        wp_reset_postdata();
        */
        ?>
    </ul>

    <?php get_footer() ?>

</body>

</html>