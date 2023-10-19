<?php
/*
Plugin Name: Iframe Embed Plugin
Description: Inserta una página web en un iframe utilizando un shortcode.
Version: 1.0
Author: Tu Nombre
*/

// Registro y carga del archivo CSS
function cargar_estilos_css() {
    $plugin_dir_url = plugin_dir_url(__FILE__);
    wp_register_style('iframe-embed-css', $plugin_dir_url . 'style.css');
    wp_enqueue_style('iframe-embed-css');
}
add_action('wp_enqueue_scripts', 'cargar_estilos_css');

// Definición del shortcode para el iframe
function embed_iframe_shortcode($atts) {
    $atts = shortcode_atts(array(
        'url' => '',
    ), $atts);

    if (!empty($atts['url']) && filter_var($atts['url'], FILTER_VALIDATE_URL)) {
        $url = esc_url($atts['url']);
        $iframe_html = '<div class="embedded-iframe-container"><iframe src="' . $url . '" frameborder="0" allowfullscreen></iframe></div>';
        return $iframe_html;
    } else {
        return 'La URL proporcionada no es válida.';
    }
}
add_shortcode('embed_iframe', 'embed_iframe_shortcode');

// Ajustar el tamaño del iframe automáticamente
function add_iframe_responsive_script() {
    if (is_singular()) {
        ?>
        <script>
            jQuery(document).ready(function($) {
                $(window).on('resize', function() {
                    $('.embedded-iframe-container iframe').css('height', $('.embedded-iframe-container').width() * 9 / 16);
                }).resize();
            });
        </script>
        <?php
    }
}
add_action('wp_footer', 'add_iframe_responsive_script');

function schedulyOptionPanel() {
    // Load options page
    require_once(SCHEDULY_PLUGIN_BOOKING_DIR . '/inc/options.php');
}


// adds menu item to admin dashboard
function schedulyAdminMenu() {
    $page = add_menu_page(__('Scheduly Widget', 'scheduly'), __('Scheduly Widget', 'scheduly'), 'manage_options', __FILE__, array(&$this, 'schedulyOptionPanel'),'dashicons-calendar-alt');
}
