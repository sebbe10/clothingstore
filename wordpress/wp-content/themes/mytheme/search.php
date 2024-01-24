<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php get_header() ?>

    <div class="theStyleSearch">

        <h1 class="thePopUpSearch">Här får du upp alla produkter som du söker efter</h1>
    </div>
    <div class="allSearch">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
        ?>
                <div class="eachSearchProduct">

                    <a href="<?php
                                the_permalink()
                                ?>">
                        <div class="thePostImg">
                            <?php
                            the_post_thumbnail();
                            ?>

                        </div>
                    </a>

                    <h2 class="theH2Search">
                        <?php
                        the_title();
                        ?>

                        <button class="theEachButton">
                            <a class="theEachA" href="<?php the_permalink() ?>">
                                Klicka för att komma till produkten</a>
                        </button>

                    </h2>
                </div>
        <?php
            endwhile;
        endif;
        ?>
    </div>

    <?php get_footer() ?>

</body>

</html>