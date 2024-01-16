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

        <!-- <div class="the_cart"> -->
        <!-- <i class="fa-solid fa-cart-shopping"> -->
        <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
            <?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?>
            <i class="fa-solid fa-cart-shopping">
            </i>
        </a>
        <!-- </i> -->

        <!-- </div> -->

        <i onclick="theOpenMenu()" class="fa-solid fa-bars"></i>

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

            <?php
            wp_nav_menu();
            ?>



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
            get_product_search_form()
            ?>

            <!-- <p class="theBtnForCategory" onclick="openCategory()">Kategory</p> -->
            <!-- <div class="theCategoryDiv"> -->
            <!-- <p class="theCategoryUL"> -->
            <!-- <li class="theLI"><a class="theA" href="">T-shirt</a></li>
                <li class="theLI"><a class="theA" href="">Huvtröja</a></li>
                <li class="theLI"><a class="theA" href="">Mjukisbyxa</a></li> -->
            <!-- </p> -->
            <!-- </div> -->
        </div>
    </header>


    <!-- <p class="thep">Bild1</p> -->

    <script>
        function theOpenMenu() {
            document.querySelector('.theHamburgerMenu').classList.toggle('youOpen')
            document.querySelector('.thePhoneAccountMeny').classList.remove('openPhoneMenu')
        }

        function theClose() {
            document.querySelector('.theHamburgerMenu').classList.remove('youOpen')
        }

        function openAccountMenu() {
            document.querySelector('.theAccountMeny').classList.toggle('openMenu')

        }

        function openAccountForPhoneMenu() {
            document.querySelector('.thePhoneAccountMeny').classList.toggle('openPhoneMenu')
            document.querySelector('.theHamburgerMenu').classList.remove('youOpen')
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