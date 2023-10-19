<?php
function mytheme_setup() {
    // Añadir soporte para menús
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'mytheme'),
    ));

    // Añadir soporte para imágenes destacadas
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'mytheme_setup');
?>