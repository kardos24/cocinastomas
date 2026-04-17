<?php
/**
 * Template Name: Contacto
 */
get_header(); ?>

<main id="main" class="site-main page-contact" role="main">
    <section class="contact-hero" data-reveal>
        <div class="container">
            <p class="eyebrow"><?php esc_html_e( 'Contacto', 'carpintero' ); ?></p>
            <h1><?php esc_html_e( 'Cuéntanos tu proyecto', 'carpintero' ); ?></h1>
            <p class="lead"><?php esc_html_e( 'Respondemos en menos de 24 horas laborables. Presupuesto sin compromiso.', 'carpintero' ); ?></p>
        </div>
    </section>

    <section class="contact-grid" data-reveal>
        <div class="container grid-2">
            <div class="contact-info">
                <h2><?php esc_html_e( 'Datos de contacto', 'carpintero' ); ?></h2>
                <ul>
                    <li><strong><?php esc_html_e( 'Teléfono', 'carpintero' ); ?>:</strong> <a href="tel:+34609608289">+34 609 608 289</a></li>
                    <li><strong>Email:</strong> <a href="mailto:tomascocinas@hotmail.com">tomascocinas@hotmail.com</a></li>
                    <li><strong><?php esc_html_e( 'Taller', 'carpintero' ); ?>:</strong> <?php esc_html_e( 'Molina de Segura', 'carpintero' ); ?></li>
                    <li><strong><?php esc_html_e( 'Horario', 'carpintero' ); ?>:</strong> <?php esc_html_e( 'L-V 9:00-18:00', 'carpintero' ); ?></li>
                    <li><strong><?php esc_html_e( 'Zona de trabajo', 'carpintero' ); ?>:</strong> <?php esc_html_e( 'Murcia', 'carpintero' ); ?></li>
                </ul>

                <div class="contact-map">
                    <!-- TODO: embed Google Maps del taller -->
                </div>
            </div>

            <div class="contact-form-wrapper">
                <h2><?php esc_html_e( 'Formulario', 'carpintero' ); ?></h2>
                <?php carpintero_render_contact_form(); ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer();
