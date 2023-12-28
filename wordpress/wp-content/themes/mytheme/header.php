<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>">
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

        <i onclick="theOpenMenu()" class="fa-solid fa-bars"></i>


        <div class="theHamburgerMenu">
            <i onclick="theClose()" class="fa-solid fa-x"></i>
            <?php wp_nav_menu() ?>
        </div>
    </header>


    <script>
        function theOpenMenu() {
            document.querySelector('.theHamburgerMenu').classList.toggle('youOpen')
        }

        function theClose() {
            document.querySelector('.theHamburgerMenu').classList.remove('youOpen')
        }
    </script>