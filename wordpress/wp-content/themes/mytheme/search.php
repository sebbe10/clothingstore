<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php get_header() ?>
    <p>search.php</p>

    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
    ?>
            <a href="<?php the_permalink() ?>">
                <div class="thePostImg">
                    <?php
                    the_post_thumbnail();
                    ?>
                </div>
            </a>
    <?php
            the_title();
            the_content();
        endwhile;
    endif;
    ?>
    <?php get_footer() ?>
</body>

</html>