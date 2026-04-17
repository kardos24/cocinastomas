<?php
/**
 * SEO local: Open Graph, Twitter Card y JSON-LD (Schema.org LocalBusiness).
 * Funciona por sí solo pero es compatible con Yoast/RankMath (ellos tendrían prioridad).
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'wp_head', 'carpintero_meta_tags', 5 );
function carpintero_meta_tags() {
    // Si hay un plugin SEO activo, evitamos duplicar Open Graph.
    if ( defined( 'WPSEO_VERSION' ) || defined( 'RANK_MATH_VERSION' ) ) return;

    $title    = wp_get_document_title();
    $desc     = get_bloginfo( 'description' );
    $url      = is_singular() ? get_permalink() : home_url( add_query_arg( null, null ) );
    $og_image = CARPINTERO_URI . '/assets/images/optimized/og/og-default.jpg';

    if ( is_singular() && has_post_thumbnail() ) {
        $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'carpintero-hero' );
        if ( $img ) $og_image = $img[0];
    }
    ?>
    <meta name="description" content="<?php echo esc_attr( $desc ); ?>">
    <meta property="og:locale" content="es_ES">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
    <meta property="og:description" content="<?php echo esc_attr( $desc ); ?>">
    <meta property="og:url" content="<?php echo esc_url( $url ); ?>">
    <meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>">
    <meta property="og:image" content="<?php echo esc_url( $og_image ); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr( $title ); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr( $desc ); ?>">
    <meta name="twitter:image" content="<?php echo esc_url( $og_image ); ?>">
    <?php
}

add_action( 'wp_head', 'carpintero_local_business_schema', 20 );
function carpintero_local_business_schema() {
    $schema = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'LocalBusiness',
        'name'        => get_bloginfo( 'name' ),
        'description' => get_bloginfo( 'description' ),
        'url'         => home_url( '/' ),
        'image'       => CARPINTERO_URI . '/assets/images/optimized/og/og-default.jpg',
        'telephone'   => '+34609608289',
        'priceRange'  => '€€',
        'address'     => array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => '[Dirección]',
            'addressLocality' => 'Molina de Segura',
            'postalCode'      => '[CP]',
            'addressCountry'  => 'ES',
        ),
        'openingHours' => 'Mo-Fr 09:00-18:00',
        'areaServed'   => 'Murcia',
    );
    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}
