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

        <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
            <?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?>
            <i class="fa-solid fa-cart-shopping">
            </i>
        </a>

        <i onclick="theOpenMenu()" class="fa-solid fa-bars"></i>

        <div class="productsearchforphone">
            <?php
            get_product_search_form()
            ?>
        </div>

        <div class="theComputerNav">
            <?php
            get_product_search_form();
            ?>

            <!-- Account menu -->

            <i onclick="openAccountMenu()" class="fa-regular fa-user"></i>
            <div class="theAccountMeny">
                <?php
                if (get_the_title() !== 'Login' && get_the_title() !== 'Mitt Konto' && get_the_title() !== 'User' && get_the_title() !== 'Members' && get_the_title() !== 'Register' && get_the_title() !== 'Logout') {
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
                ?>
            </div>
            <!--  -->
            <div class="theMenyFoSmartAndComputer">
                <?php
                wp_nav_menu();
                ?>
                <div class="outputCatAndTheButton">
                    <li class="theCategoryButton" onclick="openCategoryComputer()">Kategory</li>
                    <!--  -->
                    <?php
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

                            echo '<li><a href="' . get_term_link($cat->slug, 'product_cat') . '">' . $cat->name . '</a></li>';
                        }
                    }
                    ?>
                    <?php
                    echo '</ul>';
                    ?>
                </div>
                <!--  -->
            </div>

            <!-- <p class="theBtnForCategory2" onclick="openCategory2()">Kategory</p> -->
            <!-- <div class="theCategoryDiv2"> -->
            <!-- <p class="theCategoryUL"> -->
            <!-- <li class="theLI"><a class="theA" href="">T-shirt</a></li>
                <li class="theLI"><a class="theA" href="">Huvtröja</a></li>
                <li class="theLI"><a class="theA" href="">Mjukisbyxa</a></li> -->
            <!-- </p> -->
            <!-- </div> -->

        </div>


        <!-- Account menu for phone -->

        <i onclick="openAccountForPhoneMenu()" class="fa-solid fa-user"></i>


        <div class="thePhoneAccountMeny">

            <?php
            if (get_the_title() !== 'Login' && get_the_title() !== 'Mitt Konto' && get_the_title() !== 'User' && get_the_title() !== 'Members' && get_the_title() !== 'Register' && get_the_title() !== 'Logout') {

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
            ?>
        </div>
        <!--  -->

        <div class="theHamburgerMenu">
            <i onclick="theClose()" class="fa-solid fa-x"></i>
            <?php
            wp_nav_menu();
            ?>

            <li class="theCategoryButton" onclick="openCategory()">Kategory</li>


            <!--  -->
            <?php
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

                    echo '<li><a href="' . get_term_link($cat->slug, 'product_cat') . '">' . $cat->name . '</a></li>';
                }
            }
            ?>
            <?php
            echo '</ul>';
            ?>
            <!--  -->

        </div>
    </header>



    <!-- <p class="thep">Bild1</p> -->

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


        }

        function openCategoryComputer() {
            document.querySelector('.wc-product-categories').classList.toggle('openCat')
            document.querySelector('.wc-product-categories-list').classList.remove('openCat')

        }


        //         let ha = document.querySelector(".thep");

        // setInterval(() => {
        //   if (ha.innerHTML === "Bild1") {
        //     ha.innerHTML = "Bild2";
        //     //    <img src="theimg/Skärmbild 2023-12-28 093229.png" alt="">
        //   } else {
        //     ha.innerHTML = "Bild1";
        //   }
        // }, 5000);



        // let ha = document.querySelector('.thep')

        // setInterval(() => {
        //     if (ha.innerHTML === 'Bild1') {

        //         // ha.innerHTML = 'Bild2';
        //         //    <img src="theimg/Skärmbild 2023-12-28 093229.png" alt="">
        //     } else {
        //         ha.innerHTML = 'Bild1'
        //     }
        // }, 5000)
        // function removeABody() {
        //     document.querySelector('.theAccountMeny').classList.remove('openMenu')
        // }
    </script>