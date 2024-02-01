<footer class="theFooter">
    <p>Mail: clothingStore@gmail.com</p>

    <?php
    // Skriver ut kontakta oss i footern
    if (get_the_title()) {
        wp_nav_menu(array(
            'theme_location' => 'page-menu'

        ));
    }
    // 
    ?>

    <div class="paymethod">
        <h3>Betalnings metoder</h3>
        <p>Betala vid leverans eller med PayPal</p>
    </div>
    <p>Fri frakt över 300kr annars en frakt kostnad på 45kr</p>
</footer>

<?php get_footer() ?>
<?php wp_footer() ?>
</body>

</html>