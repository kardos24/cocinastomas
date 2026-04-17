<?php
/**
 * Mini biografía en el home.
 */
?>
<section id="sobre-mi" class="home-bio">
    <div class="container bio-grid" data-reveal>
        <div class="bio-image">
            <img src="<?php echo esc_url( CARPINTERO_URI . '/assets/images/bio/carpintero.jpg' ); ?>" alt="<?php esc_attr_e( 'Retrato del carpintero', 'carpintero' ); ?>" loading="lazy">
        </div>
        <div class="bio-text">
            <p class="eyebrow"><?php esc_html_e( 'Sobre mí', 'carpintero' ); ?></p>
            <h2><?php esc_html_e( 'Un oficio, miles de detalles', 'carpintero' ); ?></h2>
            <p><?php esc_html_e( 'Me llamo Tomás Cardos. Más de veinte años instalando cocinas a medida en Murcia me han enseñado que cada hogar es distinto. Trabajo con presupuestos cerrados, plazos que se cumplen y la misma exigencia en cada proyecto, grande o pequeño.', 'carpintero' ); ?></p>
            <a href="<?php echo esc_url( home_url( '/sobre-mi' ) ); ?>" class="btn btn-outline">
                <?php esc_html_e( 'Conoce más', 'carpintero' ); ?>
            </a>
        </div>
    </div>
</section>
