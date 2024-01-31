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

    <!-- Här ser du alla produkter som är på rea -->
    <marquee behavior="" direction="" left>
        <div class="theRea">
            <p>Rea</p>
            <p>Rea</p>
            <p>Rea</p>
            <p>Rea</p>
            <p>Rea</p>
            <p>Rea</p>
            <p>Rea</p>
            <p>Rea</p>
            <p>Rea</p>
            <p>Rea</p>
            <p>Rea</p>
            <p>Rea</p>
            <p>Rea</p>
        </div>
    </marquee>
    <div>
        <div class="theRea">
            <img class="imgrea" src="http://localhost/clothingstore/wordpress/wp-content/themes/mytheme/theImg/isrea.png" alt="">

        </div>
    </div>
    <?php

    // Denna loopen tar fram alla produkter som är på rea
    $query_args = array(
        'posts_per_page' => -1,
        'no_found_rows' => 1,
        'post_status' => 'publish',
        'post_type' => 'product',
        'meta_query' => WC()->query->get_meta_query(),
        'post__in' => array_merge(array(0), wc_get_product_ids_on_sale())
    );
    $products = new WP_Query($query_args);

    echo '<div class="allOnSaleProducts">';
    if ($products->have_posts()) :
        while ($products->have_posts()) : $products->the_post();

            $post_thumbnail_id = get_post_thumbnail_id();
            $product_thumbnail = wp_get_attachment_image_src($post_thumbnail_id, $size = 'shop-feature');
            $product_thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);
    ?>

            <div class="eachOnSaleProdcut">
                <div class="theOnSaleImg">
                    <a href="<?php the_permalink() ?>">
                        <?php the_post_thumbnail() ?>
                    </a>
                </div>
                <h2 class="onSaleTitle">
                    <?php
                    echo get_the_title()
                    ?>
                </h2>
                <h3 class="onSalePrice">
                    <?php woocommerce_template_single_price() ?>
                </h3>
                <button class="onSaleButton">
                    <a href="<?php the_permalink() ?>">
                        Klicka för att komma till rean
                    </a>
                </button>
            </div>
    <?php
        endwhile;
    endif;
    ?>
    <?php echo '</div>' ?>
    <!--  -->


    <?php get_footer() ?>



</body>

</html>