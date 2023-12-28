<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php get_header() ?>

    <div class="backgroundStyleForImg">
        <img class="theStartImg" src="<?php echo get_field('theimg')  ?>" alt="">

    </div>

    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    endif;
    ?>

    <?php get_footer() ?>

</body>

</html>