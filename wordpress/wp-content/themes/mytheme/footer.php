<footer class="theFooter">
    <!-- <p>Kontakta: 07222255556</p> -->
    <p>Mail: clothingStore@gmail.com</p>

    <?php
    if (get_the_title() !== 'Kontakta oss') {
        wp_nav_menu(array(
            'theme_location' => 'page-menu'

        ));
    }
    ?>
    <div class="paymethod">
        <h3>Betalnings metoder</h3>
        <p>Betala vid leverans eller med PayPal</p>

    </div>
</footer>

<?php get_footer() ?>
<?php wp_footer() ?>
</body>

</html>