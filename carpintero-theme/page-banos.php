<?php
/**
 * Template Name: Baños
 */
get_header(); ?>

<main id="main" class="site-main page-service page-banos" role="main">
    <section class="service-hero" data-reveal>
        <div class="container">
            <p class="service-hero__category"><?php esc_html_e( 'Baños', 'carpintero' ); ?></p>
            <div class="service-hero__rule" aria-hidden="true"></div>
            <h1><?php esc_html_e( 'Muebles de baño resistentes y con estilo', 'carpintero' ); ?></h1>
            <p class="lead"><?php esc_html_e( 'Materiales pensados para la humedad, acabados duraderos y diseños que aprovechan hasta el último rincón.', 'carpintero' ); ?></p>
        </div>
    </section>

    <section class="service-gallery" data-reveal>
        <div class="container">
            <?php get_template_part( 'template-parts/components/gallery', null, array( 'category' => 'banos' ) ); ?>
        </div>
    </section>

    <?php get_template_part( 'template-parts/components/cta' ); ?>
</main>

<?php get_footer();
