<?php
/**
 * Configuración general del tema: soporte de features, menús, tamaños de imagen.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'after_setup_theme', 'carpintero_setup' );
function carpintero_setup() {
    load_theme_textdomain( 'carpintero', CARPINTERO_DIR . '/languages' );

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' ) );
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'editor-styles' );

    register_nav_menus( array(
        'primary' => __( 'Menú principal', 'carpintero' ),
        'footer'  => __( 'Menú footer', 'carpintero' ),
    ) );

    // Tamaños de imagen específicos para galerías y antes/después.
    add_image_size( 'carpintero-gallery', 1200, 900, true );
    add_image_size( 'carpintero-gallery-sm', 600, 450, true );
    add_image_size( 'carpintero-hero', 1920, 1080, true );
    add_image_size( 'carpintero-thumb', 400, 300, true );
}

// Quitamos emojis y otras cargas innecesarias para mejorar rendimiento.
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'wp_generator' );
