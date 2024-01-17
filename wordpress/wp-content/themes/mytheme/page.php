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
    <?php
    add_action('woocommerce_before_main_content', function () {
        if (is_product_category('clothing')) {
            echo '<p>This is a <strong>custom</strong> description added programmatically.</p>';
        }
    });

    is_product_category();
    ?>
    <?php get_footer() ?>

</body>

</html>