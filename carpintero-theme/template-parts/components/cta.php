<?php
/**
 * Bloque CTA reutilizable al final de páginas de servicio.
 */
?>
<section class="cta-block" data-reveal>
    <div class="container cta-inner">
        <h2><?php esc_html_e( '¿Tienes un proyecto en mente?', 'carpintero' ); ?></h2>
        <p><?php esc_html_e( 'Cuéntanoslo y te enviamos un presupuesto sin compromiso.', 'carpintero' ); ?></p>
        <div class="cta-actions">
            <a href="<?php echo esc_url( home_url( '/contacto' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Pedir presupuesto', 'carpintero' ); ?></a>
            <a href="tel:+34609608289" class="btn btn-outline"><?php esc_html_e( 'Llamar', 'carpintero' ); ?></a>
        </div>
    </div>
</section>
