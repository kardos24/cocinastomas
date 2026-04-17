<?php
/**
 * Campos personalizados (ACF).
 * Pendiente de definir: instalar plugin Advanced Custom Fields Pro y sincronizar
 * los grupos desde /acf-json.
 *
 * Ideas de grupos:
 *  - "Home: Hero" (slider de imágenes, titular, subtitular, CTA).
 *  - "Home: Bio" (foto, texto corto, stats).
 *  - "Proyecto" (galería, categoría, resumen, destacado sí/no).
 *  - "Global: Datos de contacto" (tel, whatsapp, email, dirección, horario, redes).
 *  - "Testimonio" (autor, relación, texto, rating).
 *  - "Antes/Después" (imagen antes, imagen después, descripción).
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Carga automática de grupos ACF desde /acf-json si el plugin está activo.
add_filter( 'acf/settings/load_json', 'carpintero_acf_json_load_point' );
function carpintero_acf_json_load_point( $paths ) {
    $paths[] = CARPINTERO_DIR . '/acf-json';
    return $paths;
}

add_filter( 'acf/settings/save_json', 'carpintero_acf_json_save_point' );
function carpintero_acf_json_save_point( $path ) {
    return CARPINTERO_DIR . '/acf-json';
}
