<?php
/**
 * Carga de CSS y JS del tema.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'wp_enqueue_scripts', 'carpintero_enqueue_assets' );
function carpintero_enqueue_assets() {
    // Fuentes autoalojadas (Inter + Playfair Display, woff2 latin/latin-ext).
    wp_enqueue_style(
        'carpintero-fonts',
        CARPINTERO_URI . '/assets/css/fonts.css',
        array(),
        CARPINTERO_VERSION
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
        array( 'carpintero-main' ),
        CARPINTERO_VERSION,
        true
    );

    // gallery.js solo en páginas de servicio con galería.
    if ( is_page( array( 'cocinas', 'armarios', 'banos', 'otros-servicios' ) ) ) {
        wp_enqueue_script(
            'carpintero-gallery',
            CARPINTERO_URI . '/assets/js/gallery.js',
            array( 'carpintero-main' ),
            CARPINTERO_VERSION,
            true
        );
    }

    // before-after.js solo en otros-servicios.
    if ( is_page( 'otros-servicios' ) ) {
        wp_enqueue_script(
            'carpintero-before-after',
            CARPINTERO_URI . '/assets/js/before-after.js',
            array( 'carpintero-main' ),
            CARPINTERO_VERSION,
            true
        );
    }

    // Datos globales accesibles desde JS (ajax_url, nonce, etc.).
    wp_localize_script( 'carpintero-main', 'CARPINTERO', array(
        'ajax_url'  => admin_url( 'admin-ajax.php' ),
        'nonce'     => wp_create_nonce( 'carpintero_nonce' ),
        'home_url'  => home_url( '/' ),
    ) );
}

// Preload de la primera imagen del hero solo en portada (mejora LCP).
add_action( 'wp_head', 'carpintero_hero_preload', 1 );
function carpintero_hero_preload() {
    if ( ! is_front_page() ) return;
    $src = esc_url( CARPINTERO_URI . '/assets/images/wp-gallery-ready/hero/06.jpg' );
    echo '<link rel="preload" as="image" href="' . $src . '">' . "\n";
}
