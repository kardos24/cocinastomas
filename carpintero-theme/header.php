<?php
/**
 * Cabecera: <head>, skip link, top-bar (teléfono) y navegación con logo.
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#1A1A1A">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/svg+xml" href="<?php echo esc_url( CARPINTERO_URI . '/assets/images/favicon/favicon.svg' ); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( CARPINTERO_URI . '/assets/images/favicon/favicon-32.png' ); ?>">
    <link rel="apple-touch-icon" href="<?php echo esc_url( CARPINTERO_URI . '/assets/images/favicon/apple-touch-icon.png' ); ?>">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Saltar al contenido', 'carpintero' ); ?></a>

<header id="site-header" class="site-header" role="banner">
    <?php get_template_part( 'template-parts/header/top-bar' ); ?>
    <?php get_template_part( 'template-parts/header/nav' ); ?>
</header>
