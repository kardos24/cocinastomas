<?php
/**
 * Helpers varios.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Devuelve los proyectos de una categoría.
 */
function carpintero_get_projects( $categoria, $limit = -1 ) {
    return get_posts( array(
        'post_type'      => 'proyecto',
        'posts_per_page' => $limit,
        'tax_query'      => array( array(
            'taxonomy' => 'categoria_proyecto',
            'field'    => 'slug',
            'terms'    => $categoria,
        ) ),
    ) );
}

/**
 * Devuelve la URL de una imagen del tema.
 */
function carpintero_asset( $path ) {
    return CARPINTERO_URI . '/assets/' . ltrim( $path, '/' );
}
