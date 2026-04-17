<?php
/**
 * Template Name: Armarios
 */
get_header(); ?>

<main id="main" class="site-main page-service page-armarios" role="main">
    <section class="service-hero" data-reveal>
        <div class="container">
            <p class="eyebrow"><?php esc_html_e( 'Armarios', 'carpintero' ); ?></p>
            <h1><?php esc_html_e( 'Aprovecha cada centímetro de tu hogar', 'carpintero' ); ?></h1>
            <p class="lead"><?php esc_html_e( 'Empotrados, vestidores, correderas o abatibles. Diseñados al milímetro para tu espacio.', 'carpintero' ); ?></p>
        </div>
    </section>

    <section class="service-gallery" data-reveal>
        <div class="container">
            <?php get_template_part( 'template-parts/components/gallery', null, array( 'category' => 'armarios' ) ); ?>
        </div>
    </section>

    <section class="service-features" data-reveal>
        <div class="container">
            <h2><?php esc_html_e( 'Interiores y accesorios', 'carpintero' ); ?></h2>
            <ul class="feature-grid">
                <li><?php esc_html_e( 'Cajoneras con cierre suave', 'carpintero' ); ?></li>
                <li><?php esc_html_e( 'Zapateros y pantaloneros', 'carpintero' ); ?></li>
                <li><?php esc_html_e( 'Iluminación LED integrada', 'carpintero' ); ?></li>
                <li><?php esc_html_e( 'Espejos y vestidores', 'carpintero' ); ?></li>
            </ul>
        </div>
    </section>

    <?php get_template_part( 'template-parts/components/cta' ); ?>
</main>

<?php get_footer();
