<?php
/**
 * Custom Post Types: proyectos (galerías) y testimonios.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'init', 'carpintero_register_cpts' );
function carpintero_register_cpts() {

    // Proyectos (una entrada por trabajo, con galería y categoría).
    register_post_type( 'proyecto', array(
        'label'         => __( 'Proyectos', 'carpintero' ),
        'labels'        => array(
            'name'          => __( 'Proyectos', 'carpintero' ),
            'singular_name' => __( 'Proyecto', 'carpintero' ),
            'add_new_item'  => __( 'Nuevo proyecto', 'carpintero' ),
        ),
        'public'        => true,
        'has_archive'   => false,
        'show_in_rest'  => true,
        'menu_icon'     => 'dashicons-hammer',
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'rewrite'       => array( 'slug' => 'proyectos' ),
    ) );

    // Taxonomía: categorías de proyecto (cocinas, armarios, baños, mantenimiento).
    register_taxonomy( 'categoria_proyecto', 'proyecto', array(
        'label'        => __( 'Categorías de proyecto', 'carpintero' ),
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite'      => array( 'slug' => 'categoria-proyecto' ),
    ) );

    // Testimonios.
    register_post_type( 'testimonio', array(
        'label'         => __( 'Testimonios', 'carpintero' ),
        'public'        => false,
        'show_ui'       => true,
        'show_in_rest'  => true,
        'menu_icon'     => 'dashicons-format-quote',
        'supports'      => array( 'title', 'editor', 'thumbnail' ),
    ) );
}

// Seed de categorías al activar el tema (solo crea si no existen).
add_action( 'after_switch_theme', 'carpintero_seed_categories' );
function carpintero_seed_categories() {
    $categorias = array(
        'cocinas'        => __( 'Cocinas', 'carpintero' ),
        'armarios'       => __( 'Armarios', 'carpintero' ),
        'banos'          => __( 'Baños', 'carpintero' ),
        'mantenimiento'  => __( 'Otros servicios', 'carpintero' ),
    );
    foreach ( $categorias as $slug => $nombre ) {
        if ( ! term_exists( $slug, 'categoria_proyecto' ) ) {
            wp_insert_term( $nombre, 'categoria_proyecto', array( 'slug' => $slug ) );
        }
    }
}
