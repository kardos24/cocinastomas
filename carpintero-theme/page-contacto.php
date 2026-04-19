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
                    <li><strong><?php esc_html_e( 'Taller', 'carpintero' ); ?>:</strong> <?php esc_html_e( 'Gran Vía, Murcia 30500', 'carpintero' ); ?></li>
                    <li><strong><?php esc_html_e( 'Horario', 'carpintero' ); ?>:</strong> <?php esc_html_e( 'L-V 9:00-18:00', 'carpintero' ); ?></li>
                    <li><strong><?php esc_html_e( 'Zona de trabajo', 'carpintero' ); ?>:</strong> <?php esc_html_e( 'Murcia', 'carpintero' ); ?></li>
                </ul>

                <div class="contact-map">
                    <iframe
                        src="https://maps.google.com/maps?q=Cocinas+Tom%C3%A1s+Murcia&output=embed"
                        width="100%"
                        height="300"
                        style="border:0;border-radius:8px;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Localización Cocinas Tomás">
                    </iframe>
                </div>
            </div>

            <div class="contact-form-wrapper">
                <h2><?php esc_html_e( 'Formulario', 'carpintero' ); ?></h2>

                <?php
                $enviado = isset( $_GET['enviado'] ) ? intval( $_GET['enviado'] ) : 0;
                $error   = isset( $_GET['error'] ) ? sanitize_key( $_GET['error'] ) : '';

                if ( $enviado ) : ?>
                    <div class="form-notice form-notice--success" role="alert">
                        <?php esc_html_e( 'Mensaje enviado correctamente. Te contestaremos en menos de 24 horas.', 'carpintero' ); ?>
                    </div>
                <?php elseif ( 'validacion' === $error ) : ?>
                    <div class="form-notice form-notice--error" role="alert">
                        <?php esc_html_e( 'Por favor, completa todos los campos obligatorios y acepta la política de privacidad.', 'carpintero' ); ?>
                    </div>
                <?php elseif ( 'limite' === $error ) : ?>
                    <div class="form-notice form-notice--error" role="alert">
                        <?php esc_html_e( 'Has enviado demasiados mensajes. Por favor, espera una hora antes de intentarlo de nuevo.', 'carpintero' ); ?>
                    </div>
                <?php elseif ( 'captcha' === $error ) : ?>
                    <div class="form-notice form-notice--error" role="alert">
                        <?php esc_html_e( 'Por favor, confirma que eres humano marcando la casilla correspondiente.', 'carpintero' ); ?>
                    </div>
                <?php elseif ( 'envio' === $error ) : ?>
                    <div class="form-notice form-notice--error" role="alert">
                        <?php esc_html_e( 'Ha ocurrido un error al enviar el mensaje. Por favor, contáctanos directamente por teléfono.', 'carpintero' ); ?>
                    </div>
                <?php endif; ?>

                <?php if ( ! $enviado ) carpintero_render_contact_form(); ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer();
