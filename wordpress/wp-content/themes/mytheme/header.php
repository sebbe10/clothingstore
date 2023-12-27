<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>">
</head>

<body>
    <?php wp_head() ?>

    <?php get_header() ?>

    <header>
        <h1>
            <a href="">
                <?php bloginfo('name') ?>
            </a>
        </h1>

        <?php wp_nav_menu() ?>
    </header>