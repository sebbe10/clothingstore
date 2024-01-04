<?php
function otherMenu()
{
    register_nav_menu('page-menu', __('My Custom Menu'));
}
add_action('init', 'otherMenu');
?>

<?php



?>

