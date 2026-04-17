<?php
/**
 * Carga de CSS y JS del tema.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'wp_enqueue_scripts', 'carpintero_enqueue_assets' );
function carpintero_enqueue_assets() {
    // Google Fonts: Playfair Display (títulos) + Inter (cuerpo).
    wp_enqueue_style(
        'carpintero-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Inter:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'carpintero-main',
        CARPINTERO_URI . '/assets/css/main.css',
        array( 'carpintero-fonts' ),
        CARPINTERO_VERSION
    );

    wp_enqueue_style(
        'carpintero-animations',
        CARPINTERO_URI . '/assets/css/animations.css',
        array( 'carpintero-main' ),
        CARPINTERO_VERSION
    );

    wp_enqueue_script(
        'carpintero-main',
        CARPINTERO_URI . '/assets/js/main.js',
        array(),
        CARPINTERO_VERSION,
        true
    );

    wp_enqueue_script(
        'carpintero-scroll-reveal',
        CARPINTERO_URI . '/assets/js/scroll-reveal.js',
        array(),
        CARPINTERO_VERSION,
        true
    );

    wp_enqueue_script(
        'carpintero-gallery',
        CARPINTERO_URI . '/assets/js/gallery.js',
        array(),
        CARPINTERO_VERSION,
        true
    );

    wp_enqueue_script(
        'carpintero-before-after',
        CARPINTERO_URI . '/assets/js/before-after.js',
        array(),
        CARPINTERO_VERSION,
        true
    );

    // Datos globales accesibles desde JS (ajax_url, nonce, etc.).
    wp_localize_script( 'carpintero-main', 'CARPINTERO', array(
        'ajax_url'  => admin_url( 'admin-ajax.php' ),
        'nonce'     => wp_create_nonce( 'carpintero_nonce' ),
        'home_url'  => home_url( '/' ),
    ) );
}
