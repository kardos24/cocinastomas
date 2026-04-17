<?php
/**
 * Home: hero a pantalla completa + secciones (servicios, bio, contacto).
 */
get_header(); ?>

<main id="main" class="site-main home" role="main">
    <?php get_template_part( 'template-parts/home/hero-gallery' ); ?>
    <?php get_template_part( 'template-parts/home/services' ); ?>
    <?php get_template_part( 'template-parts/home/bio' ); ?>
    <?php get_template_part( 'template-parts/home/contact' ); ?>
</main>

<?php get_footer();
