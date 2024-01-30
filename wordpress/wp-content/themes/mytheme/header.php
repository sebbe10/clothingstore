<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php
                                    bloginfo('stylesheet_url') ?>">
    <script src="https://kit.fontawesome.com/ed4823c162.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php wp_head() ?>

    <?php get_header() ?>
    <header class="theHeader">
        <h1 class="theHeadName">
            <a href="http://localhost/clothingstore/wordpress/">
                <?php bloginfo('name') ?>
            </a>
        </h1>

        <?php global $woocommerce; ?>
        <!-- Detta gör så att du ser en varukorg icon med en siffra som ökas ellet minskas
        när man lägget till en produkt eller tar bort en produkt -->
        <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
            <?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?>
            <i class="fa-solid fa-cart-shopping">
            </i>
        </a>

        <!-- Detta är hamburger meny iconen så om man klickar på den så öppnas menyn
        för mobil versionen-->
        <i onclick="theOpenMenu()" class="fa-solid fa-bars"></i>
        <div class="theHamburgerMenu">
            <i onclick="theClose()" class="fa-solid fa-x"></i>
            <?php
            wp_nav_menu();
            ?>
            <!--  -->

            <!-- Här är kategory knappen så om man klickar på den så får man upp alla kategorier som finss -->
            <li class="theCategoryButton" onclick="openCategory()">Kategory</li>
            <!--  -->

            <?php
            // Detta gör så att du kan se alla produkt kategorier
            $taxonomy     = 'product_cat';
            $orderby      = 'name';
            $show_count   = 0;      // 1 for yes, 0 for no
            $pad_counts   = 0;      // 1 for yes, 0 for no
            $hierarchical = 1;      // 1 for yes, 0 for no
            $title        = '';
            $empty        = 0;

            $args = array(
                'taxonomy'     => $taxonomy,
                'orderby'      => $orderby,
                'show_count'   => $show_count,
                'pad_counts'   => $pad_counts,
                'hierarchical' => $hierarchical,
                'title_li'     => $title,
                'hide_empty'   => $empty
            );

            $all_categories = get_categories($args);

            echo '<ul class="wc-product-categories-list">';

            foreach ($all_categories as $cat) {

                if (
                    $cat->category_parent == 0
                ) {

                    $category_id = $cat->term_id;

                    echo '<li><a href="' . get_term_link($cat->slug, 'product_cat') . '">' . $cat->name . '</a>
                    <hr>
                    </li>';
                }
            }
            ?>
            <?php
            echo '</ul>';
            // 
            ?>
        </div>

        <div class="productsearchforphone">
            <?php
            // Detta gör så att du kan söka efter produkterna som finns på
            get_product_search_form()
            // 
            ?>
        </div>

        <div class="theComputerNav">
            <?php
            get_product_search_form();
            ?>

            <div class="theAccountMeny">
                <?php
                // Detta gör så att allt inom loopen syns 

                if (get_the_title() !== 'Login' && get_the_title() !== 'Mitt Konto' && get_the_title() !== 'Register' && get_the_title() !== 'Logout') {
                ?>
                    <div class="theUndersidaMenu">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'page-menu'
                        ));
                        ?>
                    </div>
                <?php
                }
                // 
                ?>
            </div>



            <div class="theMenyFoSmartAndComputer">
                <?php
                wp_nav_menu();
                ?>
                <div class="outputCatAndTheButton">

                    <!-- Här är kategory knappen så om man klickar på den så får man upp alla kategorier som finss -->
                    <li class="theCategoryButton" onclick="openCategoryComputer()">Kategory</li>
                    <!--  -->

                    <?php
                    // Detta gör så att du kan se alla produkt kategorier
                    $taxonomy     = 'product_cat';
                    $orderby      = 'name';
                    $show_count   = 0;      // 1 for yes, 0 for no
                    $pad_counts   = 0;      // 1 for yes, 0 for no
                    $hierarchical = 1;      // 1 for yes, 0 for no
                    $title        = '';
                    $empty        = 0;

                    $args = array(
                        'taxonomy'     => $taxonomy,
                        'orderby'      => $orderby,
                        'show_count'   => $show_count,
                        'pad_counts'   => $pad_counts,
                        'hierarchical' => $hierarchical,
                        'title_li'     => $title,
                        'hide_empty'   => $empty
                    );

                    $all_categories = get_categories($args);

                    echo '<ul class="wc-product-categories">';

                    foreach ($all_categories as $cat) {

                        if (
                            $cat->category_parent == 0
                        ) {

                            $category_id = $cat->term_id;

                            echo '<li><a href="' . get_term_link($cat->slug, 'product_cat') . '">' . $cat->name . '</a>
                            <hr>
                            </li>';
                        }
                    }
                    ?>
                    <?php
                    echo '</ul>';
                    // 
                    ?>

                </div>
            </div>
        </div>


        <!-- 
            När man klickar på denna icon när man är utloggad
            så kommer det upp registrera, logga in och kontakta oss.
            När man är inloggad så kommer det upp logga ut, mitt konto och kontakta oss.
        -->
        <i onclick="openAccountForPhoneMenu()" class="fa-solid fa-user"></i>
        <!--  -->

        <div class="thePhoneAccountMeny">
            <?php
            // Detta gör så att allt inom loopen syns 
            if (get_the_title() !== 'Login' && get_the_title() !== 'Mitt Konto' && get_the_title() !== 'Register' && get_the_title() !== 'Logout') {
            ?>
                <div class="thePhone">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'page-menu'
                    ));
                    ?>
                </div>

            <?php
            }
            // 
            ?>
        </div>
    </header>

    <script>
        function theOpenMenu() {
            document.querySelector('.theHamburgerMenu').classList.toggle('youOpen')
            document.querySelector('.thePhoneAccountMeny').classList.remove('openPhoneMenu')
            document.querySelector('.wc-product-categories-list').classList.remove('openCat')
            document.querySelector('.wc-product-categories').classList.remove('openCat')
        }

        function theClose() {
            document.querySelector('.theHamburgerMenu').classList.remove('youOpen')
            document.querySelector('.wc-product-categories-list').classList.remove('openCat')
            document.querySelector('.wc-product-categories').classList.remove('openCat')
        }

        function openAccountMenu() {
            document.querySelector('.theAccountMeny').classList.toggle('openMenu')
            document.querySelector('.wc-product-categories-list').classList.remove('openCat')
            document.querySelector('.wc-product-categories').classList.remove('openCat')
        }

        function openAccountForPhoneMenu() {
            document.querySelector('.thePhoneAccountMeny').classList.toggle('openPhoneMenu')
            document.querySelector('.theHamburgerMenu').classList.remove('youOpen')
            document.querySelector('.wc-product-categories-list').classList.remove('openCat')
            document.querySelector('.wc-product-categories').classList.remove('openCat')
        }


        function openCategory() {
            document.querySelector('.wc-product-categories-list').classList.toggle('openCat')
            document.querySelector('.thePhoneAccountMeny').classList.remove('openPhoneMenu')
        }

        function openCategoryComputer() {
            document.querySelector('.wc-product-categories').classList.toggle('openCat')
            document.querySelector('.wc-product-categories-list').classList.remove('openCat')
            document.querySelector('.thePhoneAccountMeny').classList.remove('openPhoneMenu')
        }
    </script>