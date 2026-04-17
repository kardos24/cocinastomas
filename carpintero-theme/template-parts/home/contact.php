<?php
/**
 * Bloque de contacto rápido en el home.
 */
?>
<section id="contacto" class="home-contact">
    <div class="container" data-reveal>
        <header class="section-header">
            <p class="eyebrow"><?php esc_html_e( 'Hablemos', 'carpintero' ); ?></p>
            <h2><?php esc_html_e( 'Cuéntanos tu proyecto', 'carpintero' ); ?></h2>
            <p class="lead"><?php esc_html_e( 'Llámanos o envía el formulario. Respondemos pronto.', 'carpintero' ); ?></p>
        </header>

        <div class="contact-quick">
            <a href="tel:+34609608289" class="btn btn-primary"><?php esc_html_e( 'Llamar', 'carpintero' ); ?></a>
            <a href="<?php echo esc_url( home_url( '/contacto' ) ); ?>" class="btn btn-outline"><?php esc_html_e( 'Formulario', 'carpintero' ); ?></a>
        </div>
    </div>
</section>
