<?php
/**
 * Template Name: Cocinas
 * Página de cocinas: galería filtrable + descripción + proceso + CTA.
 */
get_header(); ?>

<main id="main" class="site-main page-service page-cocinas" role="main">
    <section class="service-hero" data-reveal>
        <div class="container">
            <p class="service-hero__category"><?php esc_html_e( 'Cocinas', 'carpintero' ); ?></p>
            <div class="service-hero__rule" aria-hidden="true"></div>
            <h1><?php esc_html_e( 'Cocinas a medida que se adaptan a tu vida', 'carpintero' ); ?></h1>
            <p class="lead"><?php esc_html_e( 'Diseñamos, fabricamos e instalamos cocinas únicas pensadas para cómo cocinas, ordenas y disfrutas de tu casa.', 'carpintero' ); ?></p>
        </div>
    </section>

    <section class="service-gallery" data-reveal>
        <div class="container">
            <?php get_template_part( 'template-parts/components/gallery', null, array( 'category' => 'cocinas', 'thumb_limit' => 0 ) ); ?>
        </div>
    </section>

    <section class="service-process" data-reveal>
        <div class="container">
            <h2><?php esc_html_e( 'Nuestro proceso', 'carpintero' ); ?></h2>
            <ol class="process-steps">
                <li><strong><?php esc_html_e( '1. Visita y medición', 'carpintero' ); ?></strong><span><?php esc_html_e( 'Nos desplazamos a tu casa para entender el espacio y tus necesidades.', 'carpintero' ); ?></span></li>
                <li><strong><?php esc_html_e( '2. Diseño 3D', 'carpintero' ); ?></strong><span><?php esc_html_e( 'Te enseñamos la cocina en 3D antes de fabricar nada.', 'carpintero' ); ?></span></li>
                <li><strong><?php esc_html_e( '3. Fabricación en taller', 'carpintero' ); ?></strong><span><?php esc_html_e( 'Controlamos la calidad pieza a pieza.', 'carpintero' ); ?></span></li>
                <li><strong><?php esc_html_e( '4. Instalación', 'carpintero' ); ?></strong><span><?php esc_html_e( 'Montaje limpio y rápido, dejamos todo listo para usar.', 'carpintero' ); ?></span></li>
            </ol>
        </div>
    </section>

    <?php get_template_part( 'template-parts/components/cta' ); ?>
</main>

<?php get_footer();
